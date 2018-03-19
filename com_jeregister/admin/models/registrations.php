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
 * HelloWorldList Model
 *
 * @since  0.0.1
 */
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
                }

                return $items;
        }
}
