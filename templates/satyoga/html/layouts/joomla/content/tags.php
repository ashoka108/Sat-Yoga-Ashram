<?php
/**
 * @package     Joomla.Cms
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\Registry\Registry;

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

?>
<?php if (!empty($displayData)) : ?>
	<div class="ui right aligned right floated container"><i class="purple tags icon" title="Etiquetas asociadas a este artículo"></i>
		<?php foreach ($displayData as $i => $tag) : ?>
			<?php if (in_array($tag->access, JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id')))) : ?>
				<?php $tagParams = new Registry($tag->params); ?>
				<?php $link_class = $tagParams->get('tag_link_class', 'label label-info'); ?>
					<a class="ui tag mini purple basic label" id="tag-<?php echo $tag->tag_id; ?> tag-list<?php echo $i ?>" itemprop="keywords" href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($tag->tag_id . '-' . $tag->alias)) ?>" >
						<?php echo $this->escape($tag->title); ?>
					</a>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
