<?php
/**
 * Bootstrap List Template - Buttons
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.1
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<div class="fabrikButtonsContainer row-fluid">
	<div class="ui left floated icon menu">


<?php if ($this->showAdd) :?>

	<a class="item addbutton addRecord" href="<?php echo $this->addRecordLink;?>">
		<?php echo FabrikHelperHTML::icon('plus icon', $this->addLabel);?>
	</a>
<?php
endif;

if ($this->showToggleCols) :
	echo $this->loadTemplate('togglecols');
endif;

if ($this->canGroupBy) :

	$displayData = new stdClass;
	$displayData->icon = FabrikHelperHTML::icon('list layout icon');
	$displayData->label = FText::_('COM_FABRIK_GROUP_BY');
	$displayData->links = array();
	foreach ($this->groupByHeadings as $url => $obj) :
		$displayData->links[] = '<a data-groupby="' . $obj->group_by . '" href="' . $url . '">' . $obj->label . '</a>';
	endforeach;

	$layout = FabrikHelperHTML::getLayout('fabrik-nav-dropdown');
	echo $layout->render($displayData);
	?>


<?php endif;
if (($this->showClearFilters && (($this->filterMode === 3 || $this->filterMode === 4))  || $this->bootShowFilters == false)) :?>
		<a class="clearFilters item" href="#">
			<?php echo FabrikHelperHTML::icon('refresh icon', FText::_('COM_FABRIK_CLEAR'));?>
		</a>
<?php endif;
if ($this->showFilters && $this->toggleFilters) :?>
		<a href="#" class="item toggleFilters">
			<?php echo $this->buttons->filter;?>
			<span><?php echo FText::_('COM_FABRIK_FILTER');?></span>
		</a>
<?php endif;
if ($this->advancedSearch !== '') : ?>
		<a href="<?php echo $this->advancedSearchURL?>" class="item advanced-search-link">
			<?php echo FabrikHelperHTML::icon('search icon', FText::_('COM_FABRIK_ADVANCED_SEARCH'));?>
		</a>
<?php endif;
if ($this->showCSVImport || $this->showCSV) :?>
	<?php
	$displayData = new stdClass;
	$displayData->icon = FabrikHelperHTML::icon('upload icon');
	$displayData->label = FText::_('COM_FABRIK_CSV');
	$displayData->links = array();
	if ($this->showCSVImport) :
		$displayData->links[] = '<a href="' . $this->csvImportLink . '" class="csvImportButton">' . FabrikHelperHTML::icon('download icon', FText::_('COM_FABRIK_IMPORT_FROM_CSV'))  . '</a>';
	endif;
	if ($this->showCSV) :
		$displayData->links[] = '<a href="#" class="csvExportButton">' . FabrikHelperHTML::icon('upload icon', FText::_('COM_FABRIK_EXPORT_TO_CSV')) . '</a>';
	endif;
	$layout = FabrikHelperHTML::getLayout('fabrik-nav-dropdown');
	echo $layout->render($displayData);
	?>

<?php endif;
if ($this->showRSS) :?>
		<a href="<?php echo $this->rssLink;?>" class="item feedButton">
		<?php echo FabrikHelperHTML::image('feed.png', 'list', $this->tmpl);?>
		<?php echo FText::_('COM_FABRIK_SUBSCRIBE_RSS');?>
		</a>
<?php
endif;
if ($this->showPDF) :?>
<a href="<?php echo $this->pdfLink;?>" class="item pdfButton">
				<?php echo FabrikHelperHTML::icon('icon-file', FText::_('COM_FABRIK_PDF'));?>
			</a>
<?php endif;
if ($this->emptyLink) :?>
			<a href="<?php echo $this->emptyLink?>" class="item doempty">
			<?php echo $this->buttons->empty;?>
			<?php echo FText::_('COM_FABRIK_EMPTY')?>
			</a>
<?php
endif;
?>
</div>
<?php if (array_key_exists('all', $this->filters) || $this->filter_action != 'onchange') {
?>
<div class="ui right floated menu">
	<div <?php echo $this->filter_action != 'onchange' ? 'class="item input-append"' : ''; ?>>
	<?php if (array_key_exists('all', $this->filters)) {
		echo $this->filters['all']->element;

	if ($this->filter_action != 'onchange') {?>

		<input type="button" class="ui green button fabrik_filter_submit button" value="<?php echo FText::_('COM_FABRIK_GO');?>" name="filter" >

	<?php
	};?>

	<?php };
	?>
	</div>
</div>
<?php
}
?>
</div>
