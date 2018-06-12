<?php

// No direct access
defined('_JEXEC') or die('Restricted access');


class JeRegisterTableRegistration extends JTable
{

	function __construct(&$db)
	{
		parent::__construct('#__registration', 'id', $db);
	}
}