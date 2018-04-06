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
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select("*");
			$query->from("#__users");
			$query->where("email = '$item->email'");
			$db->setQuery((string) $query);

			//don't add existing emails
			if (count($db->loadObjectList())) {
				continue;
			}

			$data = array(
				"name" => $item->contact,
				"username" => $item->email,
				"password" => "welcome1",
				"password2" => "welcome1",
				"email" => $item->email,
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
		
			echo $user->id; die;

			//todo
			//create profile
			//change declaration to attempt to get info from profile if last declaration is over a year old	

		}
	}

	public function cancel($key = null, $urlVar = null)
	{
		$this->setRedirect(JRoute::_('index.php?option=com_jeregister&view=registrations'));
	}

}
