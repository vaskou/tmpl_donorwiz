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

JFactory::getLanguage()->load( 'com_donorwiz');

if( $this->item->alias=='contact-for-organizations'){
    $isNGOContactForm = true;
}

$this->form->setFieldAttribute('contact_name','class','uk-form-large uk-width-1-1');
$this->form->setFieldAttribute('contact_name','hint', $this->form->getFieldAttribute('contact_name','label') );
$this->form->setFieldAttribute('contact_email','class','uk-form-large uk-width-1-1');
$this->form->setFieldAttribute('contact_email','hint', $this->form->getFieldAttribute('contact_email','label') );
$this->form->setFieldAttribute('contact_subject','class','uk-form-large uk-width-1-1');
$this->form->setFieldAttribute('contact_subject','hint', $this->form->getFieldAttribute('contact_subject','label') );
$this->form->setFieldAttribute('contact_message','class','uk-form-large uk-width-1-1');
$this->form->setFieldAttribute('contact_message','hint', $this->form->getFieldAttribute('contact_message','label') );
$this->form->setFieldAttribute('captcha','class','uk-form-large uk-width-1-1');
$this->form->setFieldAttribute('captcha','label','');


$submitText = JText::_('COM_CONTACT_CONTACT_SEND');

if( $isNGOContactForm){
    
    //NGO name
    $ngonameXMLString = '<group name="ngo"><field ';
    $ngonameXMLString .= 'name="contact_ngoname" ';
    $ngonameXMLString .= 'type="text" ';
    $ngonameXMLString .= 'class="uk-form-large uk-width-1-1" ';
    $ngonameXMLString .= 'hint="COM_DONORWIZ_NGO_CONTACTFORM_NGONAME" ';
    $ngonameXMLString .= 'required="true" ';
    $ngonameXMLString .= 'default="" ';
    $ngonameXMLString .= '/></group>';
    $ngonameXML = new SimpleXmlElement($ngonameXMLString);
    $this->form ->setField ($ngonameXML);
 
    
    //Contact representative
    $this->form->setFieldAttribute('contact_name','hint', 'COM_DONORWIZ_NGO_CONTACTFORM_CONTACT_REPRESENTATIVE' );

    //Subject
    $this->form->setFieldAttribute('contact_subject','default', $this->item->name );
    //Message
    $this->form->setFieldAttribute('contact_message','default', 'empty_message' );
    
    //Telephone
    $telephoneXMLString = '<group name="ngo"><field ';
    $telephoneXMLString .= 'name="contact_phone" ';
    $telephoneXMLString .= 'type="text" ';
    $telephoneXMLString .= 'class="uk-form-large uk-width-1-1" ';
    $telephoneXMLString .= 'hint="COM_DONORWIZ_NGO_CONTACTFORM_TELEPHONE" ';
    $telephoneXMLString .= 'maxlength="10" ';
    $telephoneXMLString .= 'required="true" ';
    $telephoneXMLString .= 'default="" ';
    $telephoneXMLString .= '/></group>';
    $telephoneXML = new SimpleXmlElement($telephoneXMLString);
    $this->form ->setField ($telephoneXML);
    
    //Cause area
    $causeareaXMLString = '<group name="ngo"><field ';
    $causeareaXMLString .= 'name="contact_causearea" ';
    $causeareaXMLString .= 'type="text" ';
    $causeareaXMLString .= 'class="uk-form-large uk-width-1-1" ';
    $causeareaXMLString .= 'hint="COM_DONORWIZ_NGO_CONTACTFORM_CONTACT_CAUSEAREA" ';
    $causeareaXMLString .= 'required="true" ';
    $causeareaXMLString .= 'default="" ';
    $causeareaXMLString .= '/></group>';
    $causeareaXML = new SimpleXmlElement($causeareaXMLString);
    $this->form ->setField ($causeareaXML);
        
    //How did you find us
    $causeareaXMLString  = '<group name="ngo">';
    $causeareaXMLString .= '    <field ';
    $causeareaXMLString .= '        name="contact_howdidyoufindus" ';
    $causeareaXMLString .= '        type="list" ';
    $causeareaXMLString .= '        class="uk-form-large uk-width-1-1" ';
    $causeareaXMLString .= '        hint="COM_DONORWIZ_NGO_CONTACTFORM_HOW_DID_YOU_FIND_US" ';
    $causeareaXMLString .= '        required="true" ';
    $causeareaXMLString .= '        default="" ';
    $causeareaXMLString .= '    >';
    $causeareaXMLString .= '        <option value="">COM_DONORWIZ_NGO_CONTACTFORM_HOW_DID_YOU_FIND_US</option>';
    $causeareaXMLString .= '        <option value="event">COM_DONORWIZ_NGO_CONTACTFORM_HOW_DID_YOU_FIND_US_EVENT</option>';
    $causeareaXMLString .= '        <option value="searchengine">COM_DONORWIZ_NGO_CONTACTFORM_HOW_DID_YOU_FIND_US_SEARCH_ENGINE</option>';
    $causeareaXMLString .= '        <option value="socialmedia">COM_DONORWIZ_NGO_CONTACTFORM_HOW_DID_YOU_FIND_US_SOCIAL_MEDIA</option>';
    $causeareaXMLString .= '        <option value="ad">COM_DONORWIZ_NGO_CONTACTFORM_HOW_DID_YOU_FIND_US_AD</option>';
    $causeareaXMLString .= '        <option value="reference">COM_DONORWIZ_NGO_CONTACTFORM_HOW_DID_YOU_FIND_US_REFERENCE</option>';
    $causeareaXMLString .= '        <option value="other">COM_DONORWIZ_NGO_CONTACTFORM_HOW_DID_YOU_FIND_US_OTHER</option>';
    
    
    $causeareaXMLString .= '    </field>';
    $causeareaXMLString .= '</group>';
    $causeareaXML = new SimpleXmlElement($causeareaXMLString);
    $this->form ->setField ($causeareaXML);
    
    $submitText = JText::_('COM_DONORWIZ_NGO_CONTACTFORM_NGO_SUBMIT');

}


if (isset($this->error)) : ?>
	<div class="contact-error">
		<?php echo $this->error; ?>
	</div>
<?php endif; ?>

<div class="contact-form">
	
    <form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal uk-form">

             <?php if( $isNGOContactForm) :?>
             <div class="uk-form-row uk-margin-small-top">
				<div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-info"></i>
                    <?php echo $this->form->getInput('contact_ngoname'); ?>
                </div>
			</div>
            <?php endif;?>
 
             <?php if( $isNGOContactForm) :?>
             <div class="uk-form-row uk-margin-small-top">
				<div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-life-bouy"></i>
                    <?php echo $this->form->getInput('contact_causearea'); ?>
                </div>
			</div>
            <?php endif;?>
            
            <div class="uk-form-row uk-margin-small-top">
				<div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-user"></i>
                    <?php echo $this->form->getInput('contact_name'); ?>
                </div>
			</div>
            
            <?php if( $isNGOContactForm) :?>
            <div class="uk-form-row uk-margin-small-top">
				<div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-phone"></i>
                    <?php echo $this->form->getInput('contact_phone'); ?>
                </div>
			</div>
            <?php endif;?>
            
             <div class="uk-form-row uk-margin-small-top">
				<div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-envelope-o"></i>
                    <?php echo $this->form->getInput('contact_email'); ?>
                </div>
			</div>
			
            <div class="uk-form-row uk-margin-small-top<?php if( $isNGOContactForm ) { echo ' uk-hidden'; } ;?>">
				<div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-arrow-right"></i>
                    <?php echo $this->form->getInput('contact_subject'); ?>
                </div>
			</div>
			
            <div class="uk-form-row uk-margin-small-top<?php if( $isNGOContactForm ) { echo ' uk-hidden'; } ;?>">
				<div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-align-justify"></i>
                    <?php echo $this->form->getInput('contact_message'); ?>
                </div>
			</div>
            
            <?php if( $isNGOContactForm) :?>
            <div class="uk-form-row uk-margin-small-top">
				<div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-question"></i>
                    <?php echo $this->form->getInput('contact_howdidyoufindus'); ?>
                </div>
			</div>
            <?php endif;?>

    		<?php if ($this->params->get('show_email_copy')) : ?>
            <div class="uk-form-row uk-margin-small-top">
                    <div class="uk-form-icon uk-width-1-1">
                        <?php echo $this->form->getInput('contact_email_copy'); ?>
                    </div>
				</div>
			<?php endif; ?>
			<?php // Dynamically load any additional fields from plugins. ?>
			<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
				<?php if ($fieldset->name != 'contact') : ?>
					<?php $fields = $this->form->getFieldset($fieldset->name); ?>
					<?php foreach ($fields as $field) : ?>
                        <div class="uk-form-row uk-margin">
							<?php if ($field->hidden) : ?>
								<div class="controls">
									<?php echo $field->input; ?>
								</div>
							<?php else: ?>
								<div class="control-label">
									<?php echo $field->label; ?>
									<?php if (!$field->required && $field->type != "Spacer") : ?>
										<span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL'); ?></span>
									<?php endif; ?>
								</div>
								<div class="controls"><?php echo $field->input; ?></div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endforeach; ?>
			<div class="form-actions">
				<button class="uk-button uk-button-large uk-button-primary uk-width-1-1 uk-margin-top validate" type="submit"><?php echo $submitText; ?></button>
				<input type="hidden" name="option" value="com_contact" />
				<input type="hidden" name="task" value="contact.submit" />
				<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
				<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
	</form>
</div>
