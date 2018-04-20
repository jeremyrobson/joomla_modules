<?php
defined('_JEXEC') or die('Restricted Access');
?>

<form action="index.php?option=com_jeregister&view=declarations" method="post" id="adminForm" name="adminForm">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th width="1%"><?php echo JText::_('COM_JEREGISTER_NUM'); ?></th>
            <th width="1%"><?php echo JHtml::_('grid.checkall'); ?></th>
            <th width="5%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_PRODUCER_NAME'); ?></th>
            <th width="5%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_CONTACT_NAME'); ?></th>
            <th width="5%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_ADDRESS'); ?></th>
            <th width="2%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_CITY'); ?></th>
            <th width="1%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_PROVINCE'); ?></th>
            <th width="2%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_POSTAL_CODE'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_TELEPHONE'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_FAX'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_CELL'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_BLUEBERRIES'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_BLUEBERRY_LOCATION'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_BLUEBERRY_FARM_NAME'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_RASPBERRIES'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_RASPBERRY_LOCATION'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_RASPBERRY_FARM_NAME'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_STRAWBERRIES'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_STRAWBERRY_LOCATION'); ?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_STRAWBERRY_FARM_NAME');?></th>
            <th width="3%"><?php echo JText::_('COM_JEREGISTER_DECLARATION_DATE');?></th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="21">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tfoot>
        <?php if (!empty($this->items)) : ?>
                <?php foreach ($this->items as $i => $row) : ?>
                    <tr>
                        <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                        <td><?php echo JHtml::_('grid.id', $i, $i); ?></td>
                        <td><?php echo $row->producer_name ?? "null"; ?></td>
                        <td><?php echo $row->contact_name ?? "null"; ?></td>
                        <td><?php echo $row->address ?? "null"; ?></td>
                        <td><?php echo $row->city ?? "null"; ?>	</td>
                        <td><?php echo $row->province ?? "null"; ?></td>
                        <td><?php echo $row->postal_code ?? "null"; ?></td>
                        <td><?php echo $row->telephone ?? "null"; ?></td>
                        <td><?php echo $row->fax ?? "null"; ?></td>
                        <td><?php echo $row->cell ?? "null"; ?></td>
                        <td>
                            <?php
                                $arr = array(
                                    floatval($row->blueberry_bearing_acres) ?? 0,
                                    floatval($row->blueberry_non_bearing_acres) ?? 0,
                                );
                                echo implode(", ", $arr);
                            ?>
                        </td>
                        <td><?php echo $row->blueberry_location ?? "null"; ?></td>
                        <td><?php echo $row->blueberry_farm_name ?? "null"; ?></td>
                        <td>
                            <?php
                                $arr = array(
                                    floatval($row->summer_raspberry_bearing_acres) ?? 0,
                                    floatval($row->summer_raspberry_non_bearing_acres) ?? 0,
                                    floatval($row->fall_raspberry_bearing_acres) ?? 0,
                                    floatval($row->fall_raspberry_non_bearing_acres) ?? 0,
                                );
                                echo implode(", ", $arr);
                            ?>
                        </td>
                        <td><?php echo $row->raspberry_location ?? "null"; ?></td>
                        <td><?php echo $row->raspberry_farm_name ?? "null"; ?></td>
                        <td>
                            <?php
                                $arr = array(
                                    floatval($row->june_strawberry_bearing_acres) ?? 0,
                                    floatval($row->june_strawberry_non_bearing_acres) ?? 0,
                                    floatval($row->day_neutral_strawberry_bearing_acres) ?? 0,
                                );
                                echo implode(", ", $arr);
                            ?>
                        </td>
                        <td><?php echo $row->strawberry_location ?? "null"; ?></td>
                        <td><?php echo $row->strawberry_farm_name ?? "null"; ?></td>
                        <td><?php echo $row->create_date ?? "null"; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>