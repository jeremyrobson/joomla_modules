<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');

$fee = $this->form->getValue("membership_fee") ?? 100;
$tax = 0;
$total = number_format($fee + $tax, 2);

?>

<form action="<?php echo JRoute::_('index.php?option=com_jeregister&view=invoice&layout=invoice'); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">

	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEREGISTER_INVOICE_DETAILS_LEGEND') ?></legend>
			<div class="row-fluid">
				<div class="span12">
					<p>Producer Name:					<?php echo $this->form->getValue("producer_name"); ?></p>
					<p>User Name:						<?php echo $this->form->getValue("name"); ?></p>
					<p>Membership Fee:					<?php echo "$" . $fee; ?></p>
					<p>Tax:								<?php echo "$" . $tax; ?></p>
					<p style="font-weight: 700;">Total:	<?php echo "$" . $total; ?></p>
				</div>
				<div class="span12">
					<?php echo $this->form->renderFieldset('invoice_details');  ?>
				</div>
				<div class="span12 payment_method_div" id="paypal_div" style="display: none;">
					paypal
				</div>
				<div class="span12 payment_method_div" id="credit_div" style="display: none;">
					<button type="button" id="test">test</button> 
				</div>
				<div class="span12 payment_method_div" id="cheque_div" style="display: none;">
					<p>Please mail your cheque to:</p>
                    <p style="font-weight: 700;">
                        Ontario Berry Growers Membership<br>
                        30 Harmony Way<br>
                        Kemptville, Ont<br>
                        K0G-1J0
                    </p>
				</div>
				<div class="span12 payment_method_div" id="etransfer_div" style="display: none;">
					<p>Please send an e-transfer to:</p>
                    <p style="font-weight: 700;">
                        info@ontarioberries.com
                    </p>
				</div>
			</div>
		</fieldset>
	</div>
    
	<div class="btn-toolbar">
		<div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('invoice.back')">
				<span class="icon-arrow-left"></span><?php echo JText::_('COM_JEREGISTER_DECLARATION_BACK') ?>
			</button>
		</div>
		
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('invoice.next')">
				<span class="icon-arrow-right"></span><?php echo JText::_('COM_JEREGISTER_DECLARATION_NEXT') ?>
			</button>
		</div>
	</div>

	<input type="hidden" name="task" />
	<?php echo JHtml::_('form.token'); ?>
</form>
