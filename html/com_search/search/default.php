<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('formbehavior.chosen', 'select');
?>

<div class="ui search <?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading')) : ?>
<h1 class="ui dividing header">
  <?php if ($this->escape($this->params->get('page_heading'))) :?>
    <?php echo $this->escape($this->params->get('page_heading')); ?>
  <?php else : ?>
    <?php echo $this->escape($this->params->get('page_title')); ?>
  <?php endif; ?>
</h1>
<?php endif; ?>

<?php echo $this->loadTemplate('form'); ?>
<?php if ($this->error == null && count($this->results) > 0) :
  echo $this->loadTemplate('results');
else :
  echo $this->loadTemplate('error');
endif; ?>
</div>
