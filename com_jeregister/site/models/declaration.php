<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class JeRegisterModelDeclaration extends JModelAdmin
{

	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'Declaration', $prefix = 'JeRegisterTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

    /**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
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

	/**
	 * Method to get the data that should be injected in the form.
	 * As this form is for add, we're not prefilling the form with an existing record
	 * But if the user has previously hit submit and the validation has found an error,
	 *   then we inject what was previously entered.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
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
    
	/**
	 * Method to get the script that have to be included on the form
	 * This returns the script associated with helloworld field greeting validation
	 *
	 * @return string	Script files
	 */
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

		$json = json_decode($item["json"], true);
		$item = array_merge($item, $json);
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
