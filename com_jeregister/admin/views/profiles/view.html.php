<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewProfiles extends JViewLegacy
{
	protected $state;
	protected $items;
	protected $item;
	protected $pagination;
    protected $params;
    
	function display($tpl = null)
	{
        $app = JFactory::getApplication();

		$this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        $this->state = $this->get('State');
        $this->sortColumn = $this->state->get('list.ordering');
        $this->sortDirection = $this->state->get('list.direction');
        $this->limit = $this->state->get('list.start');
        $this->limitstart = $this->state->get('list.limitstart');
        $this->searchterms = $this->state->get('filter.search');

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

        JToolBarHelper::custom("profile.preview", "archive", "", "Import Missing Profiles", false);
		JToolBarHelper::custom("declarations.list", "archive", "", "View Declarations", false);
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_PROFILES'));
		JToolBarHelper::title("BGO Profiles");
    }
    
	protected function getSortFields()
	{
		return array(
            'b.username' => JText::_('COM_JEREGISTER_USERNAME'),
            'a.farm_name' => JText::_('COM_JEREGISTER_PROFILE_FARM_NAME'),
            'a.contact' => JText::_('COM_JEREGISTER_PROFILE_CONTACT'),
            'a.email' => JText::_('COM_JEREGISTER_PROFILE_EMAIL'),
            'a.status' => JText::_('COM_JEREGISTER_PAYMENT_STATUS'),
		);
	}
}
