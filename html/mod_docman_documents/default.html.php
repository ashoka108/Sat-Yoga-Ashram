<?
/**
 * @package     DOCman
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>
<?= helper('bootstrap.load', array(
    'package' => 'docman',
    'wrapper' => false
)); ?>
<? // No documents message if the "Show only user's documents" parameter is enabled ?>
<? if (parameters()->total == 0): if ($params->own): ?>
    <p class="alert alert-info">
        <?= translate('You do not have any documents yet.'); ?>
    </p>
<? endif; else: ?>

<? if ($params->track_downloads): ?>
    <?= helper('com://admin/docman.behavior.download_tracker'); ?>
<? endif; ?>

<? // Category ?>
<? if ($document->category_link): ?>
    <h4 class="ui top attached header">
        Documentos <?= translate('In {category}', array('category' => '<a href="'.$document->category_link.'">'.escape($document->category_title).'</a>')); ?>
    </h4>
<? endif; ?>

<div class="ui mod_docman mod_docman--documents fluid koowa segment">
    <div<?= $params->show_icon ? ' class="ui relaxed divided list mod_docman_icons"' :' ui relaxed divided list' ?>>
        <? foreach ($documents as $document): ?>
            <div class="item module_document">

                <div class="koowa_header">
                    <? // Header icon/image ?>
                    <? if ($document->icon && $params->show_icon): ?>
                    <div class="middle aligned  koowa_header__item koowa_header__item--image_container">
                        <a href="<?= $document->title_link; ?>"
                           class="koowa_header__image_link <?= $params->link_to_download ? 'docman_track_download' : ''; ?>"
                           data-title="<?= escape($document->title); ?>"
                           data-id="<?= $document->id; ?>"
                            <?= $params->download_in_blank_page ? 'target="_blank"' : ''; ?>
                            >
                            <? // Icon ?>
                            <?= import('com://site/docman.document.icon.html', array('icon' => $document->icon)) ?>
                        </a>
                    </div>
                    <? endif ?>

                    <? // Header title ?>
                    <div class="middle aligned koowa_header__item content">
                        <div class="koowa_wrapped_content header">
                            <span class="whitespace_preserver">
                                <a href="<?= $document->title_link; ?>"
                                   class="koowa_header__title_link <?= $params->link_to_download ? 'docman_track_download' : ''; ?>"
                                   data-title="<?= escape($document->title); ?>"
                                   data-id="<?= $document->id; ?>"
                                    <?= $params->download_in_blank_page ? 'target="_blank"' : ''; ?>
                                    >
                                    <?= escape($document->title);?></a>

                                <? // Label new ?>
                                <? if ($params->show_recent && isRecent($document)): ?>
                                    <div class="ui mini pink tag label"><?= translate('New'); ?></div>
                                <? endif; ?>

                                <? // Label popular ?>
                                <? if ($params->show_popular && ($document->hits >= $params->get('hits_for_popular', 100))): ?>
                                    <div class="ui mini purple tag label"><?= translate('Popular') ?></div>
                                <? endif ?>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="module_document__info description">

                    <? // Created ?>
                    <? if ($params->show_created): ?>
                    <span class="meta module_document__date">
                       <i class="icon calendar"></i> <?= helper('date.format', array('date' => $document->publish_date)); ?>
                    </span>
                    <? endif; ?>

                    <? // Size ?>
                    <? if ($params->show_size && $document->size): ?>
                    <span class="meta module_document__size">
                       - <?= helper('com://admin/docman.string.humanize_filesize', array('size' => $document->size)); ?>
                    </span>
                    <? endif; ?>

                    <? // Downloads ?>
                    <? if ($params->show_hits && $document->hits): ?>
                    <span class="meta module_document__downloads">
                      - <?= object('translator')->choose(array('{number} download', '{number} downloads'), $document->hits, array('number' => $document->hits)) ?>
                    </soan>
                    <? endif; ?>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>
<? endif; ?>