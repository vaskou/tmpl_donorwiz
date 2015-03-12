<?php

defined('_JEXEC') or die;	

JFactory::getLanguage()->load('com_donorwiz');

$form = new JForm( 'com_donorwiz.passwordreset' , array( 'control' => 'jform', 'load_data' => true ) );
$form->loadFile( JPATH_ROOT . '/components/com_donorwiz/models/forms/reset_complete.xml' );

$this->form = $form ;


JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<div class="reset-complete<?php echo $this->pageclass_sfx?>">

<h1 class="uk-article-title uk-text-center"><?php echo JText::_('COM_DONORWIZ_PASSWORD_RESET_COMPLETE_NEW_PASSWORD'); ?></h1>



	<form action="<?php echo JRoute::_('index.php?option=com_users&task=reset.complete'); ?>" method="post" class="form-validate form-horizontal well uk-form">
		
		<div class="uk-form-row uk-text-center uk-text-muted">
			<?php echo JText::_('COM_DONORWIZ_PASSWORD_RESET_COMPLETE_INSTRUCTIONS'); ?>
		</div>
		
		<div class="uk-form-row">
			<div class="uk-width-1-1">
			<div class="uk-form-icon uk-width-1-1">
				<i class="uk-icon-lock"></i>
					<?php echo $form->getInput('password1');?>
				</div>
			</div>
		</div>
		
		<div class="uk-form-row">
			<div class="uk-width-1-1">
			<div class="uk-form-icon uk-width-1-1">
				<i class="uk-icon-lock"></i>
					<?php echo $form->getInput('password2');?>
				</div>
			</div>
		</div>
		
		<div class="uk-form-row">
				<button type="submit" class="uk-button uk-width-1-1 uk-button-primary uk-button-large validate"><?php echo JText::_('COM_DONORWIZ_PASSWORD_RESET_COMPLETE_SUBMIT'); ?></button>
		</div>
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
