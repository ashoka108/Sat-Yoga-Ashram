<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

if (isset($this->error)) : ?>
	<div class="contact-error">
		<?php echo $this->error; ?>
	</div>
<?php endif; ?>
<form enctype="multipart/form-data" name="contact-form" id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="ui form form-validate form-horizontal">
<div class="ui two column stackable grid container secondary segment">
			<legend><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></legend>
					<div class="column">
						<div class="field">
							<label><?php echo $this->form->getLabel('contact_name'); ?></label>
							<?php echo $this->form->getInput('contact_name'); ?>
						</div>
					</div>
					<div class="column">
						<div class="field">
							<label><?php echo $this->form->getLabel('contact_email'); ?></label>
							<?php echo $this->form->getInput('contact_email'); ?>
						</div>
					</div>
			<?php // Dynamically load any additional fields from plugins. ?>
			<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
				<?php if ($fieldset->name != 'contact') : ?>
					<?php $fields = $this->form->getFieldset($fieldset->name); ?>
					<?php foreach ($fields as $field) : ?>
						<div class="column"><div class="field">
							<?php if ($field->hidden) : ?>
								
									<?php echo $field->input; ?>
								
							<?php else: ?>
								<label>
									<?php echo $field->label; ?>
									<?php if (!$field->required && $field->type != "Spacer") : ?>
										<span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL'); ?></span>
									<?php endif; ?>
								</label>
								<?php echo $field->input; ?>
							<?php endif; ?>
						</div></div>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		<div class="twelve wide column">
			<div class="field">
				<label><?php echo $this->form->getLabel('contact_subject'); ?></label>
				<?php echo $this->form->getInput('contact_subject'); ?>
			</div>
			<div class="field">
				<label><?php echo $this->form->getLabel('contact_message'); ?></label>
				<?php echo $this->form->getInput('contact_message'); ?>
			</div>
		</div>
    <div class="column">

        <div class="field">
            <label for="adjunto">Agregrar Archivo Adjunto</label>
            <input type="file" name="adjunto" id="adjunto">
        </div>

    </div>
		<div class="column">
			<?php if ($this->params->get('show_email_copy')) : ?>
				<div class="field">
					<label><?php echo $this->form->getLabel('contact_email_copy'); ?></label>
					<?php echo $this->form->getInput('contact_email_copy'); ?>
				</div>
			<?php endif; ?>
		</div>



		<div class="column">	
			<div class="form-actions">
				<button class="ui primary big button validate" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
				<input type="hidden" name="option" value="com_contact" />
				<input type="hidden" name="task" value="contact.submit" />
				<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
				<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</div>
</div>
	</form>
	<script type="text/javascript">
		$('#contact-form div:nth-child(4)').detach()

	</script>