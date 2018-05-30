<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewProfiles extends JViewLegacy
{

	function display($tpl = null)
	{
        $app = JFactory::getApplication();

		$this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');

        $this->sortColumn = $this->get('list.ordering', 'b.username');
        $this->sortDirection = $this->get('list.direction', 'asc');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
        
		if (JFactory::getUser()->authorise('core.admin', 'com_jeregister')) 
		{
			JToolBarHelper::preferences('com_jeregister');
		}

		$this->addToolBar();

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar()
	{
		$title = JText::_('COM_JEREGISTER_MANAGER_REGISTRATIONS');

		if ($this->pagination->total) {
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}

		JToolBarHelper::custom("registrations.import", "archive", "", "Import CSV", false);
		JToolBarHelper::custom("declarations.list", "archive", "", "View Declarations", false);
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_PROFILES'));
		JToolBarHelper::title("BGO Profiles");
	}
}
