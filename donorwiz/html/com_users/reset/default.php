<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JFactory::getLanguage()->load('com_donorwiz');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');

$form = new JForm( 'com_donorwiz.passwordreset' , array( 'control' => 'jform', 'load_data' => true ) );
$form->loadFile( JPATH_ROOT . '/components/com_donorwiz/models/forms/reset_request.xml' );
?>
<div class="reset<?php echo $this->pageclass_sfx?>">
	
<h1 class="uk-article-title uk-text-center"><?php echo JText::_('COM_DONORWIZ_PASSWORD_RESET'); ?></h1>


	<form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=reset.request'); ?>" method="post" class="form-validate form-horizontal well uk-form">
		
		<div class="uk-form-row uk-text-center uk-text-muted">
			<?php echo JText::_('COM_DONORWIZ_PASSWORD_RESET_INSTRUCTIONS'); ?>
		</div>
		
		<div class="uk-form-row">
			<div class="uk-width-1-1">
			<div class="uk-form-icon uk-width-1-1">
				<i class="uk-icon-envelope-o"></i>
					<?php echo $form->getInput('email');?>
				</div>
			</div>
		</div>
	
	
	

	

		<div class="uk-form-row">
				<button type="submit" class="uk-button uk-width-1-1 uk-button-primary uk-button-large validate"><?php echo JText::_('COM_DONORWIZ_PASSWORD_RESET_SUBMIT'); ?></button>
		</div>
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>



