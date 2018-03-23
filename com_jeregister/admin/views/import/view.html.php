<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewImport extends JViewLegacy
{
	function display($tpl = null)
	{
		$this->form = $this->get("Form");
		
		JToolBarHelper::title("Import Members");

		parent::display($tpl);
	}
}
