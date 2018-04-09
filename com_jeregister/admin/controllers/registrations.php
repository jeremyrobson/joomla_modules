<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerRegistrations extends JControllerForm
{   

	public function import($key = null, $urlVar = null)
	{
		$model = $this->getModel("import");

		$view = $this->getView('import','html');
		$view->setModel($model, true);
		$view->display();
	}

	public function upload($key = null, $urlVar = null)
	{
		/*
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');
		*/

		$key = "file"; //name of form field
		
		$file = JRequest::getVar("jform", array(), "files", "array");
		switch ($file["error"][$key]) {
			case 0:
				break;
			default:
				$message = JText::_("COM_JEREGISTER_FILE_UPLOAD_ERROR");
				$this->setRedirect(JRoute::_("index.php?option=com_jeregister&view=import", false), $message, "error");
				return;
		}
		
		$tempName = $file["tmp_name"][$key];
		$srcPath = ini_get("upload_tmp_dir") . $tempName; //path must have full permissions too
		$filename = $file["name"][$key];
		$folder = JPATH_SITE . "/uploads";

		if (file_exists($srcPath)) {
			if (copy($source = $srcPath, $dest = $folder . "/" . $filename)) {
				$message = JText::_("COM_JEREGISTER_FILE_UPLOAD_SUCCESS");
				$this->setRedirect(JRoute::_("index.php?option=com_jeregister&task=registrations.preview&filename=$filename", false), $message, "success");
				//$this->redirect();
				return ;
			}
			else {
				$message = JText::_("COM_JEREGISTER_FILE_COPY_ERROR");
			}
		}
		else {
			$message = JText::_("COM_JEREGISTER_UPLOAD_FOLDER_MISSING_ERROR");
		}

		$this->setRedirect(JRoute::_("index.php?option=com_jeregister&view=import", false), $message, "error");
		return "";
	}

	public function preview($key = null, $urlVar = null)
	{
		$filename = JRequest::getVar("filename");
		
		$model = $this->getModel("preview");
		$model->setState("preview.filename", $filename);

		$view = $this->getView('preview','html');
		$view->setModel($model, true);
		$view->display();

	}

	public function process1($key = null, $urlVar = null)
	{
		$app = JFactory::getApplication();
		$input = $app->input;

		$filename = $input->get("filename");
		$checked = $input->get("cid");

		$model = $this->getModel("preview");
		$model->setState("preview.filename", $filename);
		$items = $model->getItems();

		//filter by checked items
		if (isset($checked)) {
			$items = array_intersect_key($items, array_flip($checked));
		}

		//get registered/public group ids
		$db = JFactory::getDbo();
		$db->setQuery("SELECT `id` FROM `#__usergroups` WHERE `title` IN ('Public','Registered')");
		$db->query();
		$groups = $db->loadObjectList("id");
		$group_ids = array_keys($groups);

		jimport('joomla.user.helper');

		foreach ($items as $index => $item) {
			$query = $db->getQuery(true);
			$query->select("*");
			$query->from("#__users");
			$query->where("email = '$item->email'");
			$db->setQuery((string) $query);

			//don't add existing emails
			if (count($db->loadObjectList())) {
				continue;
			}

			$username = !empty($item->email) ? trim($item->email) : "newuser" . random_int(10000, 100000);
			$email = !empty($item->email) ? trim($item->email) : "jeremy.robson+$username@gmail.com";
			$contact = !empty($item->contact) ? trim($item->contact) : $item->farm_name;

			if ($email === "lindleyfarmand market@gmail.com") {
				$email = "lindleysfarmandmarket@gmail.com";
			}

			$data = array(
				"name" => $contact,
				"username" => $username,
				"password" => "welcome1",
				"password2" => "welcome1",
				"email" => $email,
				"block" => 0,
				"groups" => $group_ids
			);

			$user = new JUser;
			
			if(!$user->bind($data)) {
				throw new Exception("Could not bind data. Error: " . $user->getError());
			}

			if (!$user->save()) {
				throw new Exception("Could not save user. Error: " . $user->getError());
			}

			//make "clean" object to insert instead of item
			$profile = new stdClass();
			$profile->id = $user->id;
			$profile->farm_name = $item->farm_name;
			$profile->address = $item->address;
			$profile->city = $item->city;
			$profile->province = $item->province;
			$profile->postal_code = $item->postal_code;
			$profile->contact = $item->contact;
			$profile->telephone = $item->telephone;
			$profile->website = $item->website;
			$profile->other_crops = $item->other_crops;
			$profile->description = $item->description;
			$profile->facebook = $item->facebook;
			$profile->tags = $item->tags;
			$profile->latitude = $item->latitude;
			$profile->longitude = $item->longitude;
			$profile->published = 1;
			$profile->email = $item->email;

			//extract acres
			$profile->acres_strawberry = preg_match('/\d+(\.\d+)?/', $item->acres_strawberry, $matches);
			$profile->acres_raspberry = preg_match('/\d+(\.\d+)?/', $item->acres_raspberry, $matches);
			$profile->acres_blueberry = preg_match('/\d+(\.\d+)?/', $item->acres_blueberry, $matches);
			$profile->acres_fall_strawberry = preg_match('/\d+(\.\d+)?/', $item->acres_fall_strawberry, $matches);
			$profile->acres_fall_raspberry = preg_match('/\d+(\.\d+)?/', $item->acres_fall_raspberry, $matches);

			$db->insertObject("#__farm_profile", $profile, $user->id);
		}

		$message = JText::_("COM_JEREGISTER_IMPORT_COMPLETE");
		$this->setRedirect(JRoute::_("index.php?option=com_jeregister&view=import", false), $message, "success");
	}

	public function cancel($key = null, $urlVar = null)
	{
		$this->setRedirect(JRoute::_('index.php?option=com_jeregister&view=registrations'));
	}

}
