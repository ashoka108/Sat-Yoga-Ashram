<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$msgList = $displayData['msgList'];

?>
<div class="ui container system-message">
	<?php if (is_array($msgList) && !empty($msgList)) : ?>
		<div id="system-message">
			<?php foreach ($msgList as $type => $msgs) : ?>
				<div class="ui <?php echo $type; ?> message">
					<?php // This requires JS so we should add it trough JS. Progressive enhancement and stuff. ?>
					<i class="close icon" data-dismiss="alert"></i>
					<?php if (!empty($msgs)) : ?>
						<div class="header"><?php echo JText::_($type); ?></div>
						<ul class="list">
							<?php foreach ($msgs as $msg) : ?>
								<li class="alert-message"><?php echo $msg; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
