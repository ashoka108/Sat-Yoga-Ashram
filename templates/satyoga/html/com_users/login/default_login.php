<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
?>
<div class="ui middle aligned center aligned grid login <?php echo $this->pageclass_sfx; ?>">
	<div class="column">

		<?php if ($this->params->get('show_page_heading')) : ?>
		<h3 class="ui header">
			<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h3>
		<?php endif; ?>

		<?php if (($this->params->get('login_image') != '')) :?>
			<h3 class="ui image header">
				<img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JText::_('COM_USERS_LOGIN_IMAGE_ALT')?>"/>
			</h3>
		<?php endif; ?>


		<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
		<div class="content">
		<?php endif; ?>

			<?php if ($this->params->get('logindescription_show') == 1) : ?>
				<?php echo $this->params->get('login_description'); ?>
			<?php endif; ?>

		<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
		</div>
		<?php endif; ?>
		<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="ui large form">
			<div class="ui stacked segment">

				<?php foreach ($this->form->getFieldset('credentials') as $field) : ?>
					<?php if (!$field->hidden) : ?>
						<div class="field">
								<label><?php echo $field->label; ?></label>
								<?php echo $field->input; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>

				<?php if ($this->tfa): ?>
					<?php echo $this->form->getField('secretkey')->label; ?>
					<?php echo $this->form->getField('secretkey')->input; ?>
				<?php endif; ?>

				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
					<div class="field">
					  <div class="ui checkbox">
					    <input id="remember" name="remember" type="checkbox" tabindex="0"  value="yes">
					    <label><?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME') ?></label>
					  </div>
					</div>
				<?php endif; ?>

				<button type="submit" class="ui fluid large teal submit button">
					<?php echo JText::_('JLOGIN'); ?>
				</button>

				<?php if ($this->params->get('login_redirect_url')) : ?>
					<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>" />
				<?php else : ?>
					<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_menuitem', $this->form->getValue('return'))); ?>" />
				<?php endif; ?>
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</form>
		<div class="ui message">
		  <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
				<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?></a>
		  <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
				<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?></a>

			<?php $usersConfig = JComponentHelper::getParams('com_users');
			if ($usersConfig->get('allowUserRegistration')) : ?>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>
