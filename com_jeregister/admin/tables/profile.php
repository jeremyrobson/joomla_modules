<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterTableProfile extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__farm_profile', 'id', $db);
	}
}
