<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="ui divided padded link items search-results<?php echo $this->pageclass_sfx; ?> segment">
	<?php foreach ($this->results as $result) : ?>
	<div class="item">
		<div class="content">
			<?php if ($result->href) :?>
			<a class="header" style="color:#36a9e0" onMouseOver="this.style.color='#72bf44'" onMouseOut="this.style.color='#36a9e0'" href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) :?> target="_blank"<?php endif;?>>
				<div class="ui horizontal label"># <?php echo $this->pagination->limitstart + $result->count ;?></div> <?php echo $this->escape($result->title);?>
			</a>
			<?php else:?>
			<div class="header"><?php echo $this->escape($result->title);?></div>
			<?php endif; ?>
			<div class="extra">
				<a class="ui right floated basic orange button" href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) :?> target="_blank"<?php endif;?>> Ver resultado <i class="right chevron icon"></i></a>
				<?php if ($result->section) :?>
				<div class="left floated ui tag category labels <?php echo $this->pageclass_sfx; ?>">
				  <a class="ui label">
				    <?php echo $this->escape($result->section); ?>
				  </a>
				</div>
				<?php endif; ?>
			</div>
		<?php if ($result->section) : ?>

		<?php endif; ?>
			<div class="description">
				<?php echo $result->text; ?>
			</div>
		<?php if ($this->params->get('show_date')) : ?>
			<div class="extra content result-created<?php echo $this->pageclass_sfx; ?>">
				<i class="ui calendar icon"></i><?php echo JText::sprintf('JGLOBAL_CREATED_DATE_ON', $result->created); ?>
			</div>
		<?php endif; ?>
	</div>

	</div>
	<?php endforeach; ?>
</div>

<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>
