<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * This layout file is for displaying the front end form for capturing a new helloworld message
 *
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');

?>
<form action="<?php echo JRoute::_('index.php?option=com_jeregister&view=declaration&layout=declaration'); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">

	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEREGISTER_DECLARATION_DETAILS_LEGEND') ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->form->renderFieldset('declaration_details');  ?>
				</div>
			</div>
		</fieldset>
	</div>
    
	<div class="btn-toolbar">
		<div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('declaration.cancel')">
				<span class="icon-cancel"></span><?php echo JText::_('JCANCEL') ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('declaration.save')">
				<?php echo JText::_('JSAVE') ?>&nbsp;<span class="icon-arrow-right"></span>
			</button>
		</div>
	</div>

	<input type="hidden" name="task" />
	<?php echo JHtml::_('form.token'); ?>
</form>