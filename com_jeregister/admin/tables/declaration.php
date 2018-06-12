<?php

// No direct access
defined('_JEXEC') or die('Restricted access');


class JeRegisterTableDeclaration extends JTable
{

	function __construct(&$db)
	{
		parent::__construct('#__registration', 'id', $db);
	}
}