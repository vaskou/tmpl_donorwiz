<?php if ($this['widgets']->count('offcanvas')) : ?>
<div id="offcanvas" class="uk-offcanvas">
	<div class="uk-offcanvas-bar">
	<div class="uk-panel">
	<?php if ( JFactory::getUser() -> guest && JFactory::getApplication()->input->get('view', '', 'string') != 'login' && JFactory::getApplication()->input->get('view', '', 'string') != 'register' ) : ?>
	
		<div class="uk-grid">
			<div class="uk-width-1-1">
				<a class="uk-button uk-button-contrast uk-width-1-1" href="<?php echo JRoute::_('index.php?option=com_donorwiz&view=login&Itemid=314&return='.base64_encode(JFactory::getURI()->toString()).'&'. JSession::getFormToken() .'=1');?>"><?php echo JText::_('COM_DONORWIZ_LOGIN_UPPERCASE');?></a>
			</div>
			<div class="uk-width-1-1 uk-margin-small-top">
				<a class="uk-button uk-button-contrast uk-width-1-1" href="<?php echo JRoute::_('index.php?option=com_donorwiz&view=login&Itemid=314&mode=register&return='.base64_encode(JFactory::getURI()->toString()).'&'. JSession::getFormToken() .'=1');?>"><?php echo JText::_('COM_DONORWIZ_REGISTER_UPPERCASE');?></a>
			</div>
		</div>
	<?php endif;?>
	
	<?php if ( !JFactory::getUser() ->guest ) : ?>
	
	<?php 
		include_once JPATH_ROOT.'/components/com_community/libraries/core.php';
		$user = CFactory::getUser();
		$avatarUrl = $user->getThumbAvatar();
		$name = $user->getDisplayName();
	?>
	<div class="uk-width-1-1 uk-text-center">
		<img class="uk-thumbnail" src="<?php echo $avatarUrl;?>" alt="<?php echo $name;?>">
	</div>
	
	<div class="uk-width-1-1 uk-margin-small-top">
		<a class="uk-button uk-button-contrast uk-width-1-1" href="<?php echo JRoute::_('index.php?option=com_donorwiz&view=login&Itemid=314&return='.base64_encode(JFactory::getURI()->toString()).'&'. JSession::getFormToken() .'=1');?>">
		<i class="uk-icon-power-off"></i>
		<?php echo JText::_('COM_DONORWIZ_LOGOUT_UPPERCASE');?>
		</a>
	</div>
	
	<?php endif;?>
	</div>
				
		<?php echo $this['widgets']->render('offcanvas'); ?>
	</div>
</div>
<?php endif; ?>