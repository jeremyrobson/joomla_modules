<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
?>
<form action="<?php echo JRoute::_("index.php?option=com_jeregister&layout=add&user_id=$this->user_id"); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">
	<input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>" />

	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEREGISTER_TRANSACTION_ADD') ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->form->renderFieldset('transaction');  ?>
				</div>
			</div>
		</fieldset>
	</div>
    
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
