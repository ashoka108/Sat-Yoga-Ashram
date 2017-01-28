<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.core');

$doTask = $displayData['doTask'];
$class  = $displayData['class'];
$text   = $displayData['text'];
$name   = $displayData['name'];
?>
<button value="<?php echo $doTask; ?>" class="ui button modal" data-toggle="modal" data-target="#modal-<?php echo $name; ?>">
	<span class="<?php echo $class; ?>"></span>
	<?php echo $text; ?>
</button>