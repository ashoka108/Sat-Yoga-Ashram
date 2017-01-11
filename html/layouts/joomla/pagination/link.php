<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$item = $displayData['data'];

$display = $item->text;

switch ((string) $item->text)
{
	// Check for "Start" item
	case JText::_('JLIB_HTML_START') :
		$icon = "angle double left icon";
		break;

	// Check for "Prev" item
	case $item->text == JText::_('JPREV') :
		$item->text = JText::_('JPREVIOUS');
		$icon = "angle left icon";
		break;

	// Check for "Next" item
	case JText::_('JNEXT') :
		$icon = "angle right icon";
		break;

	// Check for "End" item
	case JText::_('JLIB_HTML_END') :
		$icon = "angle double right icon";
		break;

	default:
		$icon = null;
		break;
}

if ($icon !== null)
{
	$display = '<i class="' . $icon . '"></i>';
}

if ($displayData['active'])
{
	if ($item->base > 0)
	{
		$limit = 'limitstart.value=' . $item->base;
	}
	else
	{
		$limit = 'limitstart.value=0';
	}

	$cssClasses = array();

	$title = '';

	if (!is_numeric($item->text))
	{
		JHtml::_('bootstrap.tooltip');
		$cssClasses[] = 'hasTooltip';
		$title = ' title="' . $item->text . '" ';
	}

	$onClick = 'document.adminForm.' . $item->prefix . 'limitstart.value=' . ($item->base > 0 ? $item->base : '0') . '; Joomla.submitform();return false;';
}
else
{
	$class = (property_exists($item, 'active') && $item->active) ? 'active' : 'disabled';
}
?>
<?php if ($displayData['active']) : ?>
		<a class="<?php echo implode(' ', $cssClasses); ?>" <?php echo $title; ?> href="#" onclick="<?php echo $onClick; ?>">
			<?php echo $display; ?>
		</a>
<?php else : ?>
	<div class="<?php echo $class; ?>">
		<span><?php echo $display; ?></span>
	</div>
<?php endif;
