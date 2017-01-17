<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_languages
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('stylesheet', 'mod_languages/template.css', array(), true);

if ($params->get('dropdown', 1) && !$params->get('dropdownimage', 0))
{
	JHtml::_('formbehavior.chosen');
}
?>
<div class="ui mini borderless menu mod-languages<?php echo $moduleclass_sfx; ?>">
<?php if ($headerText) : ?>
	<div class="pretext"><p><?php echo $headerText; ?></p></div>
<?php endif; ?>

<div class="right menu <?php echo $params->get('inline', 1) ? 'lang-inline' : 'lang-block'; ?>">
<?php foreach ($list as $language) : ?>
	<?php if ($params->get('show_active', 0) || !$language->active) : ?>
		<a class="item" href="<?php echo $language->link; ?>">
		<?php if ($params->get('image', 1)) : ?>
			<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native, 'class' => 'flags' ), true); ?>
		<?php else : ?>
			<?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef); ?>
		<?php endif; ?>
		</a>
	<?php endif; ?>
<?php endforeach; ?>
</div>

<?php if ($footerText) : ?>
	<div class="posttext"><p><?php echo $footerText; ?></p></div>
<?php endif; ?>
</div>
