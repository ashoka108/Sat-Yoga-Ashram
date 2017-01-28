<?php
/**
 * Default list element render
 * Override this file in plugins/fabrik_element/{plugin}/layouts/fabrik-element-{plugin}-list.php
 */

defined('JPATH_BASE') or die;

$d = $displayData;
$props = isset($d->properties) ? $d->properties : '';
?>

<?php
  if ($d->icon == "icon-previous"){
    $d->icon = 'ui chevron left icon';
  }
  if ($d->icon == "icon-next"){
    $d->icon = 'ui chevron right icon';
  }
 ?>

<i data-isicon="true" class="<?php echo $d->icon;?>" <?php echo $props;?>></i>
