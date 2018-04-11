<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterModelDeclaration extends JModelAdmin
{

	public function getTable($type = 'Declaration', $prefix = 'JeRegisterTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm(
			'com_jeregister.declaration',
			'declaration',
			array(
				'control' => 'jform',
				'load_data' => $loadData
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
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_jeregister.edit.declaration.data',
			array()
		);

		if (empty($data)) {
			$data = $this->getItem();
		}

		return $data;
	}
    
	public function getScript() 
	{
		return 'administrator/components/com_jeregister/models/forms/registration.js';
	}

	public function getItem($pk = null)
	{
		$user = JFactory::getUser();

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select(array("id", "user_id", "json"))
			->from("#__registration")
			->where("user_id = " . $user->id)
			->order("create_date DESC");
		$db->setQuery($query);
        $item = $db->loadAssoc();
        $id = $item["id"];
		$json = json_decode($item["json"], true);
        $item = array_merge($item, $json);
        $item["id"] = $id;
		unset($item["json"]);

		return $item;
	}

	protected function prepareTable($table)
	{
		$user = JFactory::getUser();
		
		$jinput = JFactory::getApplication()->input; //TODO: shouldn't this data already be in $table?
		$formData = $jinput->get('jform', '', 'array');
		
		$table->user_id = $table->user_id ?? $user->id;
		$table->create_date = $table->create_date ?? date("Y-m-d H:i:s");
		$table->json = json_encode($formData);
	}
}
