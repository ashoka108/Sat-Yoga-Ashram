<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_languages
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="ui compact inverted menu" id="languages">
  <div class="ui simple text dropdown link item">
  <i class="world icon"></i>
    <div class="text"><?php echo JText::_( 'selectlang' ); ?></div>
    <div class="language menu">
    <?php foreach ($list as $language) : ?>
      <?php if ($params->get('show_active', 0) || !$language->active) : ?>
	      <a href="<?php echo $language->link;?>" class="item">
          <?php echo $language->title_native; ?>
	      </a>
    	<?php endif; ?>
   	<?php endforeach; ?>
    </div>
  </div>
</div>
