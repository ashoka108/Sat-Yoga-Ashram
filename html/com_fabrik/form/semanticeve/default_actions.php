<?php
/**
 * Bootstrap Form Template - Actions
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.1
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

$form = $this->form;
if ($this->hasActions) : ?>
<div class="fabrikActions form-actions">
	<div class="row-fluid">
		<?php if ( $form->submitButton || $form->applyButton || $form->copyButton ): ?>
			<div class="ui container">
					<?php
					echo $form->submitButton . ' ';
					echo $form->applyButton . ' ';
					echo $form->copyButton;
					?>
			</div>
		<?php endif; ?>
		<?php if ( $form->prevButton || $form->nextButton ): ?>
			<div class="ui right aligned container">
				<?php echo $form->prevButton . ' ' . $form->nextButton; ?>
			</div>
		<?php endif; ?>
		<?php if ( $form->gobackButton || $form->resetButton || $form->deleteButton ): ?>
			<div class="ui right aligned container">
					<?php
					echo $form->gobackButton  . ' ' . $this->message;
					echo $form->resetButton . ' ';
					echo $form->deleteButton;
					?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php
endif;
