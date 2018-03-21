<?php

defined('_JEXEC') or die('Restricted access');

abstract class RegistrationHelper
{
    public static function getRegistrationStatus($user_id) {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select(array("id", "user_id", "registration_id", "json", "date", "status"))
			->from("#__transaction")
			->where("user_id = " . $user_id)
			->order("date DESC");
		$db->setQuery($query);
		$transaction = $db->loadAssoc();

        //check if year has passed since previous date
        $date1 = date_create($transaction["date"]);
        $date2 = date_create("now");
        $interval = date_diff($date1, $date2);
        
        $years = (int) $interval->format("%y");

		if ($years > 0) {
            return "COM_JEREGISTER_STATUS_EXPIRED";
        }
        else {
            return "COM_JEREGISTER_STATUS_CURRENT";
        }
    }
}