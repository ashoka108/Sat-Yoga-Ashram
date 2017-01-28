<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>
<form id="searchForm" class="ui form" action="<?php echo JRoute::_('index.php?option=com_search');?>" method="post">
  <div class="two fields">
    <div class="field">
    <div class="ui action input">
      <input type="text" name="searchword" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="prompt" />
      <button name="Search" onclick="this.form.submit()" class="ui button hasTooltip" title="<?php echo JHtml::tooltipText('COM_SEARCH_SEARCH');?>"><i class="search icon"></i></button>
      <input type="hidden" name="task" value="search" />
    </div>
  </div>

      <?php if ($this->params->get('search_areas', 1)) : ?>
   <div class="field">
        <legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
        <?php foreach ($this->searchareas['search'] as $val => $txt) :
          $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
        ?>
        <div class="ui checkbox">
          <input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> >
          <label for="area-<?php echo $val;?>" class="compact"><?php echo JText::_($txt); ?></label>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
    <?php if ($this->params->get('search_phrases', 1)) : ?>
  <div class="two fields">
    <div class="field"></div>
    <div class="field">
      <legend><?php echo JText::_('COM_SEARCH_FOR');?>
      </legend>

        <?php echo $this->lists['searchphrase']; ?>

    </div>
  <?php endif; ?>
</div>
  <div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
    <?php if (!empty($this->searchword)):?>
    <h3 class="ui dividing header"><?php echo('<div class="ui big orange label">' . $this->total . '</div>');?>
    <?php echo JText::_( 'ResultsFound' ); ?>
</h3>
    <?php endif;?>
  </div>

<?php if ($this->total > 0) : ?>
  <div class="two fields ordering-box">
      <div class="field">
        <label for="ordering" class="ordering">
          <?php echo JText::_('COM_SEARCH_ORDERING');?>
        </label>
        <?php echo $this->lists['ordering'];?>
      </div>
      <div class="field">
      <label for="limit">
        <?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
      </label>
      <?php echo $this->pagination->getLimitBox(); ?>
      </div>
  </div>
<p class="counter">
    <?php echo $this->pagination->getPagesCounter(); ?>
  </p>

<?php endif; ?>

</form>
