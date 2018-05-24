<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterTableTransaction extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__transaction', 'id', $db);
	}
}