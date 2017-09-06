<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_hitlist
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HitListList Model
 *
 * @since  0.0.1
 */
class HitListModelHitListList extends JModelList
{
    var $catid = "";

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
			'com_hitlist.hitlistlist',
			'hitlistlist',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	protected function loadFormData()
	{
		//todo: convert these to real tasks in controller.php
		if (isset($_POST["task"]) && !empty($_POST["jform"]["catid"])) {
			if ($_POST["task"] == "update") {
				$this->catid = $_POST["jform"]["catid"];
			}
			else {
				$this->catid = "";
			}
		}

		$data = array(
            "catid" => $this->catid,
            "hidden_catid" => $this->catid
        );

		return $data;
	}

    protected function getListQuery()
    {
        // Initialize variables.
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);

        // Create the base select statement.
        $query->select('id, hits, title')
        ->from($db->quoteName('#__content'));
        if (!empty($this->catid)) {
            $query->where("catid=" . $this->catid);
        }

        return $query;
    }
}