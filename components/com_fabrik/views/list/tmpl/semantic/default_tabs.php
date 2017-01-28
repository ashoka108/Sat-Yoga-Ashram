<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

if (!empty($this->tabs)) :
?>
<div clas="ui menu">
	<?php foreach ($this->tabs as $tab) :
	?>
    <a class="item" href="<?php echo $tab->url?>"><?php echo $tab->label?></a>
	<?php endforeach; ?>
</div>
<?php endif; ?>
