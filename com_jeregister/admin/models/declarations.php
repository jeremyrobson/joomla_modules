<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterModelDeclarations extends JModelList
{
    protected function getListQuery()
    {
        $input = JFactory::getApplication()->input;
        $user_id = $input->get('id');

        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('*');
        $query->from($db->quoteName("#__registration"));

        if (!empty($user_id)) {
            $query->where($db->quoteName("user_id") . " = $user_id");
        }

        return $query;
    }

    //intercept and modify items before query hits the view
    public function getItems()
    {
        $items = parent::getItems();

        foreach ($items as $id => $item) {
            $json = json_decode($item->json, false);

            foreach ($json->main as $key => $value) {
                $items[$id]->$key = $value;
            }
            unset($items[$id]->json);
        }

        return $items;
    }
}
