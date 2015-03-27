<div class="uk-header fullscreen dw-header-sticky">

	<div class="uk-grid uk-margin-top uk-margin-bottom">
		
		<div class="uk-width-3-10">
		<?php if ($this['widgets']->count('offcanvas')) : ?>
			<div class="uk-float-left"><a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a><a href="#offcanvas" class="uk-navbar-toggle-text-link uk-hidden-small" data-uk-offcanvas><?php echo JText::_('MENU');?></a></div>
		<?php endif; ?>
		
		<?php if ($this['widgets']->count('toolbar-l')) : ?>
			<div class="uk-float-left uk-margin-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
		<?php endif; ?>	
	
		</div>
	
		<div class="uk-width-4-10 uk-text-center">
			<a class="tm-logo" href="<?php echo $this['config']->get('site_url'); ?>">
				<img src="http://assets.donorwiz.com/logo/logo.png" width="199" height="30" alt="DONORwiz - Η αλληλεγγύη στην πράξη" title="Αρχική Σελίδα" data-uk-tooltip/>
			</a>
		</div>
		
		<div class="uk-width-3-10">
			<div class="uk-margin-right toolbar-r uk-text-right">
				
				<?php JFactory::getLanguage()->load('com_donorwiz');?>
				
				<?php if ( JFactory::getUser() -> guest && JFactory::getApplication()->input->get('view', '', 'string') != 'login' && JFactory::getApplication()->input->get('view', '', 'string') != 'register' ) : ?>
					
								<?php echo JLayoutHelper::render(
				'popup-button', 
				array (
					'isAjax' => true,
					'buttonLink' => JRoute::_('index.php?option=com_donorwiz&view=login&Itemid=314&return='.base64_encode(JFactory::getURI()->toString()).'&'. JSession::getFormToken() .'=1'),
					'buttonText' => JText::_('COM_DONORWIZ_LOGIN_UPPERCASE'),
					'buttonIcon' => '',
					'buttonType' => 'uk-hidden-small uk-button uk-button-link',

					'layoutPath' => JPATH_ROOT .'/components/com_donorwiz/layouts/user',
					'layoutName' => 'login',
					'layoutParams' => array('isPopup'=>true),
					'scripts'=>array(Juri::base() . 'media/com_donorwiz/js/registration.js')
				), 
				JPATH_ROOT .'/components/com_donorwiz/layouts/popup' , 
				null ); 
			?>
			
			
			<?php echo JLayoutHelper::render(
				'popup-button', 
				array (
					'isAjax' => true,
					'buttonLink' => JRoute::_('index.php?option=com_donorwiz&view=login&Itemid=314&mode=register&return='.base64_encode(JFactory::getURI()->toString()).'&'. JSession::getFormToken() .'=1'),
					'buttonText' => JText::_('COM_DONORWIZ_REGISTER_UPPERCASE'),
					'buttonIcon' => '',
					'buttonType' => 'uk-hidden-small uk-button uk-button-blank',

					'layoutPath' => JPATH_ROOT .'/components/com_donorwiz/layouts/user',
					'layoutName' => 'login',
					'layoutParams' => array( 'mode' => 'register', 'isPopup'=>true ),
					'scripts'=>array(Juri::base() . 'media/com_donorwiz/js/registration.js')
				), 
				JPATH_ROOT .'/components/com_donorwiz/layouts/popup' , 
				null ); 
			?>

			<!--
					
					<a class="uk-hidden-small uk-button uk-button-link" href="<?php echo JRoute::_('index.php?option=com_donorwiz&view=login&Itemid=314&return='.base64_encode(JFactory::getURI()->toString()).'&'. JSession::getFormToken() .'=1');?>"><?php echo JText::_('COM_DONORWIZ_LOGIN_UPPERCASE');?></a>
					<a class="uk-hidden-small uk-button uk-button-blank" href="<?php echo JRoute::_('index.php?option=com_donorwiz&view=login&Itemid=314&mode=register&return='.base64_encode(JFactory::getURI()->toString()).'&'. JSession::getFormToken() .'=1');?>"><?php echo JText::_('COM_DONORWIZ_REGISTER_UPPERCASE');?></a>
				-->
				
				<?php endif;?>
				
				<?php if ( !JFactory::getUser() ->guest && JFactory::getApplication()->input->get('view', '', 'string') != 'login' && JFactory::getApplication()->input->get('view', '', 'string') != 'register' ) : ?>
					<?php //echo JLayoutHelper::render( 'notifications', array () , JPATH_ROOT .'/components/com_donorwiz/layouts/user' , null ); ?>
						
						
					<?php 
						include_once JPATH_ROOT.'/components/com_community/libraries/core.php';
						$user = CFactory::getUser();
						$avatarUrl = $user->getThumbAvatar();
						$name = $user->getDisplayName();
					?>
						<a href="<?php echo JRoute::_('index.php?option=com_donorwiz&view=dashboard&Itemid=298');?>">
						<img class="uk-thumbnail uk-thumbnail-extra-mini" src="<?php echo $avatarUrl;?>" alt="<?php echo $name;?>">
						</a>
				<?php endif;?>
				
			</div>
		</div>
		
	</div>
	
</div>