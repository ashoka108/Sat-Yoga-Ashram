<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>

	<div class="column">
		<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
	    <div class="ui items">
	    	<div class="item">
	        <div class="content">
	            <div class="header">
	                <i class="phone icon"></i> Teléfono<?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>s<?php endif; ?>
	            </div>
	            <div class="meta">
	                <span class="contact-telephone" itemprop="telephone">
	                    <?php echo nl2br($this->contact->telephone); ?><br/>
	                </span>
	                <?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
	                <span class="contact-mobile" itemprop="telephone">
	                    <?php echo nl2br($this->contact->mobile); ?><br/>
	                </span>
	                <?php endif; ?>
	            </div>
	        </div>
	    </div>
		<?php endif; ?>
		<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
        <div class="item">
            <div class="content" itemprop="email">
                <div class="header">
                    <i class="mail outline icon"></i> Correo electrónico
                </div>
                <div class="meta">
                    <span class="contact-emailto">
                        <?php echo $this->contact->email_to; ?>
                    </span>
                </div>
            </div>
        </div>
    	<?php endif; ?>
		<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
	    <div class="item">
	        <div class="content">
	            <div class="header">
	                <i class="fax icon"></i> Fax
	            </div>
	        <div class="meta">
	    
	        <span class="contact-fax" itemprop="faxNumber">
	            <?php echo nl2br($this->contact->fax); ?><br/>
	        </span>
	            </div>
	        </div>
	    </div>
		<?php endif; ?>
		<?php if ($this->params->get('allow_vcard')) :  ?>
        <div class="item">
        <div class="content">
        <?php echo JText::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS');?>
             <a href="<?php echo JRoute::_('index.php?option=com_contact&amp;view=contact&amp;id=' . $this->contact->id . '&amp;format=vcf'); ?>">
             <?php echo JText::_('COM_CONTACT_VCARD');?></a>
        </div>
        </div>
    	<?php endif; ?>
	</div>
</div>
<div class="column">
	<div class="ui items">
	    <div class="item">
        <div class="content contact-address " itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <?php if (($this->params->get('address_check') > 0) &&
        ($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
        <?php if ($this->params->get('address_check') > 0) : ?>
        <div class="header">
            <i class="building outline icon"></i> Dirección
        </div>
        <?php endif; ?>
            <div class="meta">
                <?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
                <span class="contact-street" itemprop="streetAddress">
                <?php echo nl2br($this->contact->address) . '<br />'; ?>
                </span>
                <?php endif; ?>
                <?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
                <span class="contact-suburb" itemprop="addressLocality">
                <?php echo $this->contact->suburb . ', '; ?>
                </span>
                <?php endif; ?>
                <?php if ($this->contact->state && $this->params->get('show_state')) : ?>
                <span class="contact-state" itemprop="addressRegion">
                <?php echo $this->contact->state . ', '; ?>
                </span>
                <?php endif; ?>
                <?php if ($this->contact->country && $this->params->get('show_country')) : ?>
                <span class="contact-country" itemprop="addressCountry">
                <?php echo $this->contact->country . '.<br /><br />'; ?>
                </span>
                <?php endif; ?>
                <?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
                <span class="contact-postcode" itemprop="postalCode">
                Apartado Postal: <?php echo $this->contact->postcode; ?>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if ($this->params->get('contact_horario', false)) : ?>
	    <div class="item">
	        <div class="content">
	            <div class="header">
	                <i class="clock icon"></i> Horario de atención
	            </div>
	            <div class="meta">
	                <span class="contact-horario"><?php echo $this->params->get('contact_horario');?><br/></span>
	            </div>
	        </div>
	    </div>
    <?php endif; ?>
    <?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
    <div class="item">
    	<div class="content">
	        <span class="contact-webpage">
	        	<i class="linkify icon"></i>
		        <a href="<?php echo $this->contact->webpage; ?>" target="_blank" itemprop="url">
		         Ver página web</a>
	        </span>
    	</div>
    </div>
    <?php endif; ?>
    </div>
</div>
