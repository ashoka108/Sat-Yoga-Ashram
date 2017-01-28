<?php
/**
 * Email form layout
 */

defined('JPATH_BASE') or die;

$d = $displayData;
?>
<a href="<?php echo $d->pdfURL; ?>" data-role="open-form-pdf" class="ui button btn-default">
	<?php echo FabrikHelperHTML::icon('file pdf', FText::_('COM_FABRIK_PDF'));?>
</a>&nbsp;