<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterModelSummary extends JModelAdmin
{
	public function getTable($type = 'Registration', $prefix = 'JeRegisterTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_jeregister.summary',
			'declaration', //reuse the declaration.xml so fields are ready-made and pre-filled
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
		return $this->getItem();
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

		$json = json_decode($item["json"], true);
		$item = array_merge($item, $json);
		unset($item["json"]);

		return $item;
	}

	protected function prepareTable($table)
	{
		//echo "<pre>"; print_r($table); die;
	}
}
