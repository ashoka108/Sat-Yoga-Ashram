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

?>
<button onclick="<?php echo $doTask; ?>" class="ui small button">
	<span class="<?php echo $class; ?>"></span>
	<?php echo $text; ?>
</button>
