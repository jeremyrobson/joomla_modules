<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterModelDeclaration extends JModelAdmin
{
	public function getTable($type = 'Declaration', $prefix = 'JeRegisterTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getItem($pk = null)
	{
		$user = JFactory::getUser();

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select(array("id", "user_id", "json"))
			->from("#__registration")
			->where("user_id = " . $user_id)
			->order("create_date DESC");
		$db->setQuery($query);
		$item = $db->loadAssoc();

		$json = json_decode($item["json"], true);
		$item = array_merge($item, $json);
		unset($item["json"]);

		return $item;
	}
}
