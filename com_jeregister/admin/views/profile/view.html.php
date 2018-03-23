<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewProfile extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $script;
	protected $canDo;

	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');
		$this->canDo = JHelperContent::getActions('com_jeregister', 'profile', $this->item->id);

		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		$this->addToolBar();

		JToolBarHelper::title("Profile for " . $this->item->farm_name);

		parent::display($tpl);
	}

	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		$input->set('hidemainmenu', true);

		JToolBarHelper::title(JText::_('COM_JEREGISTER_PROFILE_EDIT'), 'profile');

		if ($this->canDo->get('core.edit'))
		{
			JToolBarHelper::apply('profile.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('profile.save', 'JTOOLBAR_SAVE');

		}
		JToolBarHelper::cancel('profile.cancel', 'JTOOLBAR_CLOSE');
	}
}
