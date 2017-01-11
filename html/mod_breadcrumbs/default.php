<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
?>

<div itemscope itemtype="http://schema.org/BreadcrumbList" class="ui breadcrumb<?php echo $moduleclass_sfx; ?>">
  <?php if ($params->get('showHere', 1)) : ?>
    <?php echo JText::_('MOD_BREADCRUMBS_HERE'); ?>&#160;

  <?php else : ?>
    <i class="right chevron icon divider"></i>
  <?php endif; ?>

  <?php
  // Get rid of duplicated entries on trail including home page when using multilanguage
  for ($i = 0; $i < $count; $i++)
  {
    if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link)
    {
      unset($list[$i]);
    }
  }

  // Find last and penultimate items in breadcrumbs list
  end($list);
  $last_item_key = key($list);
  prev($list);
  $penult_item_key = key($list);

  // Make a link if not the last item in the breadcrumbs
  $show_last = $params->get('showLast', 1);

  // Generate the trail
  foreach ($list as $key => $item) :
    if ($key != $last_item_key) :
      // Render all but last item - along with separator ?>
        <?php if (!empty($item->link)) : ?>
          <a itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" href="<?php echo $item->link; ?>" class="section">
            <span itemprop="name">
              <?php echo $item->name; ?>
            </span>
          </a>
        <?php else : ?>
          <div class="active section" itemprop="name">
            <?php $item->name; ?>
          </div>
        <?php endif; ?>

        <?php if (($key != $penult_item_key) || $show_last) : ?>
          <div class="divider">
            <?php echo $separator; ?>
          </div>
        <?php endif; ?>
        <meta itemprop="position" content="<?php echo $key + 1; ?>">
    <?php elseif ($show_last) :
      // Render last item if reqd. ?>

      <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active section ">
        <span itemprop="name">
          <?php echo $item->name; ?>
        </span>
        <meta itemprop="position" content="<?php echo $key + 1; ?>">
      </div>

    <?php endif;
  endforeach; ?>
</div>
