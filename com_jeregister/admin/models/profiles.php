<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelProfiles extends JModelList
{
    protected function getListQuery()
    {
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query
                ->select('*')
                ->from($db->quoteName("#__farm_profile", "a"))
                ->join("LEFT", $db->quoteName("#__users", "b") . " ON " . $db->quoteName("a.id") . " = " . $db->quoteName("b.id"));

	return $query;
    }

    //intercept and modify items before query hits the view
    public function getItems()
    {
        $items = parent::getItems();
	/*
        foreach ($items as $id => $item) {
            $json = json_decode($item->json, true);
            $items[$id]->membership_fee = $json["membership_fee"];
        }
	*/

        return $items;
    }
}
