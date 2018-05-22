<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelProfiles extends JModelList
{
    protected function getListQuery()
    {
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);
        $subquery = $db->getQuery(true);

        $subquery
            ->select(array('user_id', 'json', 'date'))
            ->from($db->quoteName("#__transaction", "t"))
            ->order($db->quoteName("date") . " DESC")
            ->setLimit(1);

        $query
            ->select('*')
            ->from($db->quoteName("#__farm_profile", "a"))
            ->join("LEFT", $db->quoteName("#__users", "b") . " ON " . $db->quoteName("a.id") . " = " . $db->quoteName("b.id"))
            ->join("LEFT", "(" . $subquery . ") AS " . $db->quoteName("latest_transaction") . " ON " . $db->quoteName("latest_transaction.user_id") . " = " . $db->quoteName("a.id"));

        //echo "<pre>" . $query->__toString(); die;

        return $query;
    }

    //intercept and modify items before query hits the view
    public function getItems()
    {
        $items = parent::getItems();

        //determine if amount as been paid this year
        foreach ($items as $id => $item) {
            $json = json_decode($item->json, true);
            $items[$id]->membership_fee = $json["membership_fee"];

            $transaction_year = date('Y', strtotime('2018-04-11 00:06:57'));
            $current_year = date("Y");

            $items[$id]->paid = $transaction_year == $current_year && $items[$id]->membership_fee >= 100;
        }

        return $items;
    }
}
