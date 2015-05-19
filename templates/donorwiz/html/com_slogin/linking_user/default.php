<?php
/**
 * Social Login
 *
 * @version     1.0
 * @author        SmokerMan, Arkadiy, Joomline
 * @copyright    © 2012. All rights reserved.
 * @license     GNU/GPL v.3 or later.
 */

// No direct access to this file
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
//$doc = JFactory::getDocument();
//$doc->addStyleSheet(JURI::root().'media/com_slogin/comslogin.css')
?>
<div class="login uk-container uk-container-center uk-text-center" style="max-width:600px;">

    <h1>
        <?php echo JText::_('COM_SLOGIN_LINKING'); ?>
    </h1>

    <p class="login-description">
        <?php echo JText::sprintf('COM_SLOGIN_LINKING_DESC', $this->email); ?>
    </p>

    <form class="uk-form uk-form-horizontal form-validate" action="<?php echo JRoute::_('index.php?option=com_slogin&task=join_mail'); ?>" method="post">
        <fieldset>
            <div class="uk-form-row uk-margin-small-top login-fields">
                <label id="username-lbl" for="username" class="required uk-hidden"></label>
				<div class="uk-width-1-1">
				<div class="uk-form-icon uk-width-1-1">
					<i class="uk-icon-envelope-o"></i>
					<input type="text" name="username" id="username" value="" class="validate-username required uk-form-large uk-width-1-1" size="25" placeholder="<?php echo JText::_('COM_SLOGIN_USERNAME_LABEL'); ?>">
				</div>
				</div>

            </div>
            <div class="uk-form-row uk-margin-small-top login-fields">
                <label id="password-lbl" for="password" class="required uk-hidden"></label>
				<div class="uk-width-1-1">
				<div class="uk-form-icon uk-width-1-1">
					<i class="uk-icon-lock"></i>
					<input type="password" name="password" id="password" value="" class="validate-password required uk-form-large uk-width-1-1" size="25" placeholder="<?php echo JText::_('COM_SLOGIN_PASS'); ?>">
				</div>
				</div>

            </div>
            

                    <div class="uk-form-row">
						<button type="submit" class="button uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo JText::_('COM_SLOGIN_JOIN'); ?></button>
					</div>
                
				<div class="uk-width-1-1">
                    <input type="button" class="button uk-button uk-button-link uk-button-large"
                           onclick="document.location.href='<?php echo JRoute::_($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>'"
                           value="<?php echo JText::_('COM_SLOGIN_CREATE_NEW_USER'); ?>"/>
                </div>
                <div class="uk-width-1-1">
                    <input type="button" class="button uk-button uk-button-link uk-button-large"
                           onclick="document.location.href='<?php echo JRoute::_('index.php?option=com_slogin&task=recallpass'); ?>'"
                           value="<?php echo JText::_('COM_SLOGIN_LOST_PASS_LOGIN'); ?>"/>
                </div>
                <div class="uk-width-1-1">
                    <input type="button" class="button uk-button uk-button-link uk-button-large"
                           onclick="document.slogin_logout_form.submit();"
                           value="<?php echo JText::_('COM_SLOGIN_NO_LOGIN'); ?>"/>
                </div>
            
			<input type="hidden" name="return"
                   value="<?php echo $this->after_reg_redirect; ?>"/>
            <input type="hidden" name="user_id" value="<?php echo $this->id; ?>"/>
            <input type="hidden" name="provider" value="<?php echo $this->provider; ?>"/>
            <input type="hidden" name="slogin_id" value="<?php echo $this->slogin_id; ?>"/>
            <?php echo JHtml::_('form.token'); ?>
        </fieldset>
    </form>
</div>

<form action="<?php echo JRoute::_('index.php'); ?>"
      method="post" id="slogin_logout_form" name="slogin_logout_form">
    <input type="hidden" name="option" value="com_users">
    <input type="hidden" name="task" value="user.logout">
    <input type="hidden" name="return" value="<?php echo $this->failure_redirect; ?>">
    <?php echo JHtml::_('form.token'); ?>
</form>