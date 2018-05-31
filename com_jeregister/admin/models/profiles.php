<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelProfiles extends JModelList
{
    public function __construct($config = array())
    {
        $config['filter_fields'] = array(
			'b.username',
            'a.farm_name',
            'a.contact',
            'a.email',
            'a.payment_status'
        );
        parent::__construct($config);
    }

    protected function populateState($ordering = "b.username", $direction = "asc")
    {
        parent::populateState($ordering, $direction);
    }

    protected function getListQuery()
    {
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);
        $subquery = $db->getQuery(true);

        $subquery
            ->select(array('user_id', 'json', 'date', 'status'))
            ->from($db->quoteName("#__transaction", "t"))
            ->order($db->quoteName("date") . " DESC")
            ->setLimit(1);

        $query
            ->select('a.*, b.username, latest_transaction.*')
            ->from($db->quoteName("#__farm_profile", "a"))
            ->join("LEFT", $db->quoteName("#__users", "b") . " ON " . $db->quoteName("a.id") . " = " . $db->quoteName("b.id"))
            ->join("LEFT", "(" . $subquery . ") AS " . $db->quoteName("latest_transaction") . " ON " . $db->quoteName("latest_transaction.user_id") . " = " . $db->quoteName("a.id"));

        $search = $this->getState('filter.search');

        if (!empty($search)) {
            $like = $db->quote("%" . $search . "%");
            $query->where('CONCAT_WS(" ", b.username, a.farm_name, a.contact, a.email) LIKE ' . $like);
        }

        $payment_status = $this->getState("filter.payment_status");
        if (!empty($payment_status)) {
            $query->where("latest_transaction.status = '$payment_status'");
        }

        $state = $this->state;
        $query->order($db->escape($this->state->get("list.ordering", "b.username")) . ' ' . $db->escape($this->state->get("list.direction", "asc")));

        //echo "<pre>" . $query->__toString(); die;

        return $query;
    }

    //intercept and modify items before query hits the view
    public function getItems()
    {
        $items = parent::getItems();

        //determine if amount as been paid this year (status == 1)
        foreach ($items as $id => $item) {

            $transaction_year = date('Y', strtotime('2018-04-11 00:06:57'));
            $current_year = date("Y");
            //$items[$id]->payment_status = $transaction_year == $current_year && $items[$id]->status == "paid";
            $items[$id]->payment_status = $items[$id]->status;
        }

        return $items;
    }
}
