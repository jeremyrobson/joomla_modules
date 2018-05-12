<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');

$id = (int) $this->item->id;

?>
<form action="<?php echo JRoute::_("index.php?option=com_jeregister&layout=edit&id=$id"); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">

	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEREGISTER_PROFILE_EDIT') ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->form->renderFieldset('profile');  ?>
				</div>
			</div>
		</fieldset>
	</div>
    
	<input type="hidden" name="task" value="profile.edit" />
	<?php echo JHtml::_('form.token'); ?>
</form>
