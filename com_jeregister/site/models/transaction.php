<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterModelTransaction extends JModelAdmin
{
	public function getTable($type = 'Transaction', $prefix = 'JeRegisterTable', $config = array())
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
		//not needed because users view invoices, not transactions
	}

	protected function prepareTable($table)
	{
        //echo "<pre>"; print_r($table); die;
	}
}
