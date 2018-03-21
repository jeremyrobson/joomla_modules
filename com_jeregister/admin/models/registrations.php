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
                        ->select('*')
                        ->from($db->quoteName("#__registration", "a"))
                        ->join("LEFT", $db->quoteName("#__users", "b") . " ON " . $db->quoteName("a.user_id") . " = " . $db->quoteName("b.id"));

                return $query;
        }

        //intercept and modify items before query hits the view
        public function getItems()
        {
                $items = parent::getItems();

                foreach ($items as $id => $item) {
                        $json = $item->json;
                        $items[$id]->json = json_decode($json, true);
                        $items[$id]->registration_status = RegistrationHelper::getRegistrationStatus($item->user_id);
                }

                return $items;
        }
}
