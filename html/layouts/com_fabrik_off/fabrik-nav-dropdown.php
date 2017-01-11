<?php
/**
 * Layout: Bootstrap dropdown
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.3.3
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
$d = $displayData;

?>

<div class="ui dropdown">
	<a href="#" class="dropdown-toggle groupBy item" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		<?php echo $d->icon;?>
		<?php echo $d->label; ?>
		<i class="dropdown icon"></i>
	</a>
	<div class="menu">
		<?php foreach ($d->links as $link) :?>
			<div class="item"><?php echo $link;?></div>
			<?php
		endforeach;?>
	</div>
</div>