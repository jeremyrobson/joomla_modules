<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelProfile extends JModelAdmin
{
	public function getTable($type = "Profile", $prefix = "JeRegisterTable", $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

    protected function prepareTable($table)
    {
        //$table->tags = implode(",", $table->tags); //only if converting to/from multi-select
        //note: the field "tags" is reserved by joomla in AdminModel.php, use "profile_tags" instead!
    }

	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm(
			"com_jeregister.form",
			"profile",
			array(
				"control" => "jform",
				"load_data" => $loadData
			)
		);
		
		if (empty($form))
		{
			$errors = $this->getErrors();
			throw new Exception(implode("\n", $errors), 500);
		}

		return $form;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState(
			"com_jeregister.edit.profile.data",
			array()
		);

		if (empty($data)) {
			$input = JFactory::getApplication()->input;
			$user_id = $input->get("user_id");
			$data = $this->getItem($user_id);
		}

		return $data;
    }
}
