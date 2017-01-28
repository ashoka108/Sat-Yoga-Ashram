<?php
/**
 * Repeat group add button
 */

defined('JPATH_BASE') or die;

$d = $displayData;
?>
<a class="addGroup ui small primary button" href="#">
	<?php echo  FabrikHelperHTML::icon('icon-plus fabrikTip tip-small', '', 'opts="{trigger: \'hover\'}" title="' . FText::_('COM_FABRIK_ADD_GROUP'). '"');?>
</a>