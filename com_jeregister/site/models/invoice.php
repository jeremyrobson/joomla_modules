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

        if (empty($registration_id)) {
            $user = JFactory::getUser();
            $user_id = $user->id;

            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query
                ->select(array("id"))
                ->from($db->quoteName("#__registration"))
                ->where("user_id = " . $user_id);
            $db->setQuery($query);
            $registration = $db->loadAssoc();
            $registration_id = $registration["id"];
        }

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select(array("t.id", "t.json as transaction", "r.json as registration", "u.name"))
			->from($db->quoteName("#__registration", "r"))
			->join("LEFT", $db->quoteName("#__transaction", "t") . " ON (" . $db->quoteName("t.registration_id") . " = " . $db->quoteName("r.id") . ")")
			->join("LEFT", $db->quoteName("#__users", "u") . " ON (" . $db->quoteName("r.user_id") . " = " . $db->quoteName("u.id") . ")")
			->where("r.id = " . $registration_id)
            ->order("t.date DESC"); //get most recent transaction
		$db->setQuery($query);
        $item = $db->loadAssoc();
        
        if (!empty($item)) {
            if (!empty($item["registration"])) {
                $registration = json_decode($item["registration"], true);
                $item = array_merge($item, $registration["main"]);
                unset($item["registration"]);
            }

            if (!empty($item["transaction"])) {
                $transaction = json_decode($item["transaction"], true);
                $item = array_merge($item, $transaction);
                unset($item["transaction"]);
            }
        }

		return $item;
	}

	public function getScript()
	{
		return "administrator/components/com_jeregister/models/forms/invoice.js";
	}

	protected function prepareTable($table)
	{
		//todo: save chosen transaction type (paypal, credit card, cheque)
	}
}
