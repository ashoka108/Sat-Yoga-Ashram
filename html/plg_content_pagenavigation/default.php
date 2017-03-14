<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$lang = JFactory::getLanguage(); ?>

<div class="ui right floated">
<?php if ($row->prev) :
  $direction = $lang->isRtl() ? 'right' : 'left'; ?>
  <a class="previous item ui basic button" href="<?php echo $row->prev; ?>" rel="prev">
    <i class="chevron <?php echo $direction ?> icon"></i>
    <?php echo $row->prev_label; ?>
  </a>
<?php endif; ?>
<?php if ($row->next) :
  $direction = $lang->isRtl() ? 'left' : 'right'; ?>
    <a class="next item ui basic button" href="<?php echo $row->next; ?>" rel="next">
      <?php echo $row->next_label; ?>
      <i class="chevron <?php echo $direction ?> icon"></i>
    </a>
<?php endif; ?>
</div>
