<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewJeRegister extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $script;
	protected $canDo;

	public function display($tpl = null)
	{
		// Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');

		// What Access Permissions does this user have? What can (s)he do?
		$this->canDo = JHelperContent::getActions('com_jeregister', 'jeregister', $this->item->id);

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		// Hide Joomla Administrator Main menu
		$input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);

		JToolBarHelper::title($isNew ? JText::_('COM_JEREGISTER_MANAGER_JEREGISTER_NEW')
		                             : JText::_('COM_JEREGISTER_MANAGER_JEREGISTER_EDIT'), 'jeregister');
		// Build the actions for new and existing records.
		if ($isNew)
		{
			// For new records, check the create permission.
			if ($this->canDo->get('core.create')) 
			{
				JToolBarHelper::apply('jeregister.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('jeregister.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('jeregister.save2new', 'save-new.png', 'save-new_f2.png',
				                       'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('jeregister.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($this->canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::apply('jeregister.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('jeregister.save', 'JTOOLBAR_SAVE');
 
				// We can save this record, but check the create permission to see
				// if we can return to make a new one.
				if ($this->canDo->get('core.create')) 
				{
					JToolBarHelper::custom('jeregister.save2new', 'save-new.png', 'save-new_f2.png',
					                       'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if ($this->canDo->get('core.create')) 
			{
				JToolBarHelper::custom('jeregister.save2copy', 'save-copy.png', 'save-copy_f2.png',
				                       'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('jeregister.cancel', 'JTOOLBAR_CLOSE');
		}
	}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$isNew = ($this->item->id == 0);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_JEREGISTER_JEREGISTER_CREATING')
		                           : JText::_('COM_JEREGISTER_JEREGISTER_EDITING'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_jeregister"
		                                  . "/views/jeregister/submitbutton.js");
		JText::script('COM_JEREGISTER_JEREGISTER_ERROR_UNACCEPTABLE');
	}
}