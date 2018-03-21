<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelProfile extends JModelAdmin
{
	public function getTable($type = "Profile", $prefix = "ProfileTable", $config = array())
	{	
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getItem($pk = null)
	{
		$user_id = $this->getState("profile.user_id");
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select("*")
			->from("#__farm_profile")
			->where("id = " . $user_id);
		$db->setQuery($query);
		$item = $db->loadAssoc();

		return $item;
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
			$data = $this->getItem();
		}

		return $data;
	}
}
