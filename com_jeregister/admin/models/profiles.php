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
            't.status'
        );
        parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication();

        //get input var
        $ordering = $app->input->get("filter_order", "");
        $direction = $app->input->get("filter_order_Dir", "");
        $limit = $app->input->get("limit");
        $limitstart = $app->input->get("limitstart", "");
        $search = $app->input->get('filter_search');

        //if input var empty, get user state, else set user state
        if ($ordering === "") {
            $ordering = $app->getUserStateFromRequest("jeregister.profiles.ordering", "b.username");
        }
        else {
            $app->setUserState("jeregister.profiles.ordering", $ordering);
        }

        if ($direction === "") {
            $direction = $app->getUserStateFromRequest("jeregister.profiles.direction", "asc");
        }
        else {
            $app->setUserState("jeregister.profiles.direction", $direction);
        }

        if ($limit === "") {
            $limit = $app->getUserStateFromRequest("jeregister.profiles.limit", "20");
        }
        else {
            $app->setUserState("jeregister.profiles.limit", $limit);
        }

        if ($limitstart === "") {
            $limitstart = $app->getUserStateFromRequest("jeregister.profiles.limitstart", "0");
        }
        else {
            $app->setUserState("jeregister.profiles.limitstart", $limitstart);
        }

        if ($search === null) {
            $search = $app->getUserStateFromRequest("jeregister.profiles.search", "");
        }
        else {
            $app->setUserState("jeregister.profiles.search", $search);
        }

        //set states in model
        $this->setState("list.ordering", $ordering);
        $this->setState("list.direction", $direction);
        $this->setState("list.limit", $limit);
        $this->setState("list.start", $limitstart);
        $this->setState("filter.search", $search);

        //this is supposed to populate the states "list.ordering" and "list.direction", but only "list.ordering" works for some reason
        //parent::populateState($ordering, $direction);
    }

    protected function getListQuery()
    {
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);
        $transactions = $db->getQuery(true);
        $most_recent_transaction = $db->getQuery(true);

        $most_recent_transaction
            ->select('MAX(t2.date)')
            ->from($db->quoteName('#__transaction', 't2'))
            ->where('t2.user_id = t1.user_id');

        $transactions
            ->select(array('user_id', 'json', 'date', 'status'))
            ->from($db->quoteName('#__transaction', 't1'))
            ->where('t1.date = (' . $most_recent_transaction . ')');

        $query
            ->select('a.*, b.username, t.*')
            ->from($db->quoteName('#__farm_profile', 'a'))
            ->join("LEFT", $db->quoteName("#__users", "b") . " ON " . $db->quoteName("a.id") . " = " . $db->quoteName("b.id"))
            ->join("LEFT", "(" . $transactions . ") AS " . $db->quoteName("t") . " ON " . $db->quoteName("t.user_id") . " = " . $db->quoteName("a.id"));

        $search = $this->getState('filter.search');

        if (!empty($search)) {
            $like = $db->quote("%" . $search . "%");
            $query->where('CONCAT_WS(" ", b.username, a.farm_name, a.contact, a.email) LIKE ' . $like);
        }

        $payment_status = $this->getState("filter.payment_status");
        if (!empty($payment_status)) {
            $query->where("t.status = '$payment_status'");
        }

        //echo "<pre>"; print_r($this); echo "</pre>";

        $query->order($db->escape($this->getState("list.ordering", "b.username")) . ' ' . $db->escape($this->getState("list.direction", "asc")));

        //echo "<pre>" . $query->__toString(); die;

        return $query;
    }

    //intercept and modify items before query hits the view
    public function getItems()
    {
        $items = parent::getItems();

        //determine if amount as been paid this year
        foreach ($items as $id => $item) {
            $transaction_year = date('Y', strtotime($item->date));
            $current_year = date("Y");
            $items[$id]->payment_status = $transaction_year == $current_year && $items[$id]->status == "paid" ? "paid" : "not_paid";
        }

        return $items;
    }
}
