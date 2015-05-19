<?php
/**
 * Social Login
 *
 * @version 	1.0
 * @author		SmokerMan, Arkadiy, Joomline
 * @copyright	© 2012. All rights reserved.
 * @license 	GNU/GPL v.3 or later.
 */

// No direct access to this file
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
//$doc = JFactory::getDocument();
//$doc->addStyleSheet(JURI::root().'media/com_slogin/comslogin.css')
?>
<div class="login uk-container uk-container-center uk-text-center" style="max-width:600px;">

    <h1>
        <?php echo JText::_('COM_SLOGIN_COMPARISON'); ?>
    </h1>

    <div class="login-description">
        <?php echo JText::sprintf('COM_SLOGIN_COMPARISON_DESC', $this->email); ?>
    </div>

    <form class="uk-form uk-form-horizontal form-validate" action="<?php echo JRoute::_('index.php?option=com_slogin&task=join_mail'); ?>" method="post">
        <fieldset>
            <div class="uk-form-row uk-margin-small-top">
                
				<label id="username-lbl" for="username" class="required uk-hidden"></label>
				<div class="uk-width-1-1">
				<div class="uk-form-icon uk-width-1-1">
					<i class="uk-icon-envelope-o"></i>
					<input type="text" name="username" value="" class="validate-username required uk-form-large uk-width-1-1" size="25" placeholder="<?php echo JText::_('COM_SLOGIN_USERNAME_LABEL'); ?>">
				</div>
				</div>

            </div>
            
			<div class="uk-form-row uk-margin-small-top">
                <label id="password-lbl" for="password" class="required uk-hidden"></label>
				<div class="uk-width-1-1">
				<div class="uk-form-icon uk-width-1-1">
					<i class="uk-icon-lock"></i>
					<input type="password" name="password" value="" class="validate-password required uk-form-large uk-width-1-1" size="25" placeholder="<?php echo JText::_('COM_SLOGIN_PASS'); ?>">
				</div>
				</div>

            </div>
			<div class="uk-form-row">
				<button type="submit" class="button validate uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo JText::_('COM_SLOGIN_JOIN'); ?></button>
            </div>
		   <input type="hidden" name="return"
                   value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>"/>
            <input type="hidden" name="user_id" value="<?php echo $this->id; ?>"/>
            <input type="hidden" name="provider" value="<?php echo $this->provider; ?>"/>
            <input type="hidden" name="slogin_id" value="<?php echo $this->slogin_id; ?>"/>
            <?php echo JHtml::_('form.token'); ?>
        </fieldset>
    </form>

    <h2><?php echo JText::_('COM_SLOGIN_LOST_PASS'); ?></h2>

    <form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=reset.request') ?>" method="post" class="uk-form uk-form-horizontal form-validate">
        <p><?php echo JText::_('COM_SLOGIN_LOST_PASS_DESC'); ?></p>
		<div class="uk-form-row uk-margin-small-top">
			<div class="uk-width-1-1">
				<div class="uk-form-icon uk-width-1-1">
					<i class="uk-icon-envelope-o"></i>
					<input type="text" name="jform[email]" value="<?php echo $this->email ?>" readonly="readonly" class="validate-email required invalid uk-form-large uk-width-1-1" size="30" aria-required="true" required="required" aria-invalid="true" />
				</div>
			</div>
        </div>
		<div class="uk-form-row">
        <button type="submit" class="validate uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo JText::_('COM_SLOGIN_SUBMIT'); ?></button>
        
        </div>
		
		<?php echo JHtml::_('form.token'); ?>

    </form>
	
</div>