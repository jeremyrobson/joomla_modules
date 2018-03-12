<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterModelInvoice extends JModelAdmin
{
	public function getTable($type = 'Registration', $prefix = 'JeRegisterTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_jeregister.invoice',
			'invoice',
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
		$app =JFactory::getApplication();
		$registration_id = $app->getUserState("com_jeregister.registration_id", "0");

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select(array("t.id", "t.json as transaction", "r.json as registration", "u.name"))
            ->from($db->quoteName("#__transaction", "t"))
            ->join("LEFT", $db->quoteName("#__registration", "r") . " ON (" . $db->quoteName("t.registration_id") . " = " . $db->quoteName("r.id") . ")")
            ->join("LEFT", $db->quoteName("#__users", "u") . " ON (" . $db->quoteName("t.user_id") . " = " . $db->quoteName("u.id") . ")")
			->where("registration_id = " . $registration_id)
			->order("date DESC"); //get most recent transaction
		$db->setQuery($query);
		$item = $db->loadAssoc();

		$registration = json_decode($item["registration"], true);
		$item = array_merge($item, $registration);
		unset($item["registration"]);

		$transaction = json_decode($item["transaction"], true);
		$item = array_merge($item, $transaction);
		unset($item["transaction"]);

		//echo "<pre>"; print_r($item); die;

		return $item;
	}

	protected function prepareTable($table)
	{
		//todo: save chosen transaction type (paypal, credit card, cheque)
	}
}
