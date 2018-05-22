<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelTransactions extends JModelList
{
    protected function getListQuery()
    {
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query
                ->select('*')
                ->from($db->quoteName("#__transaction", "a"))
                ->join("LEFT", $db->quoteName("#__users", "b") . " ON " . $db->quoteName("a.user_id") . " = " . $db->quoteName("b.id"));

        $user_id = $this->getState("transactions.user_id");

        if (isset($user_id)) {
            $query->where("user_id = $user_id");
        }

        return $query;
    }

	//intercept and modify items before query hits the view
	public function getItems()
	{
		$items = parent::getItems();

		foreach ($items as $id => $item) {
			$json = json_decode($item->json, true);

            if (is_array($json)) {
                foreach ($json as $key => $value) {
                    $items[$id]->$key = $value;
                }
            }
		}
		return $items;
    }
    
    public function delete()
    {
        $cids = JRequest::getVar('cid', array(0), 'post', 'array');
        $row = $this->getTable();

        foreach($cids as $cid) {
            if (!$row->delete( $cid )) {
                $this->setError( $row->getErrorMsg() );
                return false;
            }
        }

        return true;
    }
}
