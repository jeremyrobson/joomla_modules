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
				echo JText::_("COM_JEREGISTER_FILE_UPLOAD_ERROR");
				return;
		}
		
		$tempName = $file["tmp_name"][$key];
		$srcPath = ini_get("upload_tmp_dir") . $tempName; //path must have full permissions too
		$filename = $file["name"][$key];
		$folder = JPATH_SITE . "/uploads";

		if (file_exists($srcPath)) {
			if (copy($source = $srcPath, $dest = $folder . "/" . $filename)) {
				$this->setRedirect(JRoute::_("index.php?option=com_jeregister&task=registrations.preview&filename=$filename", false));
				$this->redirect();
				return JText::_("COM_JEREGISTER_FILE_UPLOAD_SUCCESS");
			}
			else {
				echo JText::_("COM_JEREGISTER_FILE_COPY_ERROR");
			}
		}
		else {
			echo JText::_("COM_JEREGISTER_UPLOAD_FOLDER_MISSING_ERROR");
		}

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

		echo "<pre>"; print_r($items); die;

		foreach ($items as $index => $item) {

			//todo
			//check to make sure email doesn't already exist
			//create user account
			//create profile
			//change declaration to attempt to get info from profile if last declaration is over a year old	

		}

		//done

	}

	public function cancel($key = null, $urlVar = null)
	{

	}

}
