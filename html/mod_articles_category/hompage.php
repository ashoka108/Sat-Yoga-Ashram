<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<div class="ui items <?php echo $moduleclass_sfx; ?>">
  <?php foreach ($list as $item) : ?>

    <div class="item">
    <?php if (json_decode($item->images)->image_intro) : ?>
      <a class="ui tiny rounded image" href="<?php echo $item->link; ?>">
        <img class="small-blog" src="<?php echo json_decode($item->images)->image_intro; ?>" alt="<?php echo json_decode($item->images)->image_intro_alt; ?>">
      </a>
    <?php endif; ?>
    <div class="content">
      <?php if ($params->get('link_titles') == 1) : ?>
        <a class="header <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
          <?php echo $item->title; ?>
        </a>
      <?php else : ?>
        <div class="header"> <?php echo $item->title; ?></div>
      <?php endif; ?>
      <div class="meta">
        <?php if ($item->displayHits) : ?>
          <span class="mod-articles-category-hits">
            (<?php echo $item->displayHits; ?>)
          </span>
        <?php endif; ?>

        <?php if ($params->get('show_author')) : ?>
          <span class="mod-articles-category-writtenby">
            By: <?php echo $item->displayAuthorName; ?>
          </span>
        <?php endif;?>

        <?php if ($item->displayCategoryTitle) : ?>
          <span class="mod-articles-category-category">
            (<?php echo $item->displayCategoryTitle; ?>)
          </span>
        <?php endif; ?>

        <?php if ($item->displayDate) : ?>
          <span class="mod-articles-category-date">
            <i class="calendar icon"></i>Published: <?php echo $item->displayDate; ?>
          </span>
        <?php endif; ?>
      </div>
      <div class="description">
      <?php if ($params->get('show_introtext')) : ?>
        <p class="mod-articles-category-introtext">
          <?php echo $item->displayIntrotext; ?>
        </p>
      <?php endif; ?>

      <?php if ($params->get('show_readmore')) : ?>
        <p class="mod-articles-category-readmore">
          <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
            <?php if ($item->params->get('access-view') == false) : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
            <?php elseif ($readmore = $item->alternative_readmore) : ?>
              <?php echo $readmore; ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
              <?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
            <?php else : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php endif; ?>
          </a>
        </p>
      <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
