<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelTransaction extends JModelAdmin
{
	public function getTable($type = "Transaction", $prefix = "JeRegisterTable", $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
    
    protected function prepareTable($table)
    {
        $app = JFactory::getApplication();

        $table->json = json_encode(array(
            "membership_fee" => $app->getUserState("jeregister.transaction.membership_fee"),
            "payment_method" => $app->getUserState("jeregister.transaction.payment_method")
        ));
    }

	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm(
			"com_jeregister.form",
			"transaction",
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
			"com_jeregister.edit.transaction.data",
			array()
		);

		if (empty($data)) {
			$input = JFactory::getApplication()->input;
			$transaction_id = $input->get("id");
			$data = $this->getItem($transaction_id);
		}

		return $data;
	}
	
	public function getItem($pk = null)
	{
        $user_id = $this->getState("transaction.user_id");

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select(array("*", "f.id as user_id"))
            ->from("#__farm_profile f")
            ->join("LEFT", "#__transaction t ON f.id = t.user_id")
            ->where("f.id = " . $user_id);
        
        //echo "<pre>"; print_r($query->__toString()); die;

        if (!empty($pk)) {
            $query->where("AND", "transaction_id = " . $pk); 
        }

		$db->setQuery($query);
		$item = $db->loadAssoc();

        if (!empty($item["json"])) {
            $json = json_decode($item["json"], true);
            $item = array_merge($item, $json);
            unset($item["json"]);
        }

        //echo '<pre>'; print_r($item); die;

		return $item;
	}

}
