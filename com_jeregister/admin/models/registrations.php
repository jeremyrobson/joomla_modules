<?php
defined('_JEXEC') or die('Restricted access');

JLoader::import('helpers.registration',dirname(JPATH_COMPONENT_ADMINISTRATOR .DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR));

class JeRegisterModelRegistrations extends JModelList
{
    protected function getListQuery()
    {
        // Initialize variables.
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);

        // Create the base select statement.
        $query
            ->select('a.id,a.name,a.username,a.email')
            ->from($db->quoteName("#__users", "a"))
            ->join("LEFT", $db->quoteName("#__farm_profile", "b") . " ON " . $db->quoteName("a.id") . " = " . $db->quoteName("b.id"))
            ->where("b.id IS NULL");

        return $query;
    }

    //intercept and modify items before query hits the view
    public function getItems()
    {
        $items = parent::getItems();

        //key by id
        $arr = array();
        foreach ($items as $item) {
            $arr[$item->id] = $item;
        }

        return $arr;
    }
}
