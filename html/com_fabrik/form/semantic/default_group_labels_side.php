<?php
/**
 * Bootstrap Form Template: Group Labels Side
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.0
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

$element = $this->element;
?>


<div class="controls">
	<div class="fabrikElement" <?php if ($this->tipLocation == 'side') : ?>data-content="<?php echo $element->tipSide ?>"<?php endif ?>>
		<?php echo $element->label;?>
		<?php echo $element->element;?>
	</div>
	<div class="ui error message <?php echo $this->class?>">
		<p><?php echo $element->error ?></p>
	</div>
</div>

