<?php

defined('_JEXEC') or die('Restricted access');

require_once(JPATH_ROOT . '/libraries/stripe-php-6.7.1/lib/Stripe.php');

class JeRegisterViewInvoice extends JViewLegacy
{
	protected $form = null;
	protected $canDo;

	public function display($tpl = null)
	{
		$option = JRequest::getCmd('option'); //com_jregister namespace
		$app = JFactory::getApplication();
		$page = $app->getUserState("$option.page", "1");

		$this->form = $this->get("Form");
		$this->script = $this->get("Script");

        $this->STRIPE_API_SECRET_KEY = "sk_test_0F4ACQwFV5DmOYQVGJx0yDko";
        $this->STRIPE_API_KEY = "pk_test_W0dpF99Dq117oQj7buKVUqxP";

		parent::display($tpl);

		$this->setDocument();
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_DECLARATION_INVOICE'));
		$document->addScript(JURI::root() . $this->script);
	}
}
