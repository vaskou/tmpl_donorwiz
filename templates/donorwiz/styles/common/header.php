<?php JFactory::getLanguage()->load('com_donorwiz');?>

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
	
		<div class="uk-width-4-10 uk-text-center uk-vertical-align" style="height:35px;">
			
			<a class="tm-logo uk-vertical-align-middle" href="<?php echo $this['config']->get('site_url'); ?>">
				<img 	src="http://assets.donorwiz.com/logo/logo.png" 
						width="199" height="30" 
						alt="<?php echo JText::_('COM_DONORWIZ_DONORWIZ');?> - <?php echo JText::_('COM_DONORWIZ_SOLIDARITY_APPLIED');?>" 
						title="<?php echo JText::_('COM_DONORWIZ_HOMEPAGE');?>" 
						data-uk-tooltip
				>
			</a>
			
		</div>
		
		<div class="uk-width-3-10 uk-hidden-small">
			<div class="uk-margin-right toolbar-r uk-text-right">
				
				
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
					'buttonType' => 'uk-hidden-small uk-button uk-button-blank uk-button-border',

					'layoutPath' => JPATH_ROOT .'/components/com_donorwiz/layouts/user',
					'layoutName' => 'login',
					'layoutParams' => array( 'mode' => 'register', 'isPopup'=>true ),
					'scripts'=>array(Juri::base() . 'media/com_donorwiz/js/registration.js')
				), 
				JPATH_ROOT .'/components/com_donorwiz/layouts/popup' , 
				null ); 
			?>
				
		<?php endif;?>
				
				<?php if ( !JFactory::getUser() ->guest && JFactory::getApplication()->input->get('view', '', 'string') != 'login' && JFactory::getApplication()->input->get('view', '', 'string') != 'register' ) : ?>
					
					<?php //echo JLayoutHelper::render( 'notifications', array () , JPATH_ROOT .'/components/com_donorwiz/layouts/user' , null ); ?>
					
					<?php 
						include_once JPATH_ROOT.'/components/com_community/libraries/core.php';
						$user = CFactory::getUser();
						$avatarUrl = $user->getThumbAvatar();
						$name = $user->getDisplayName();
					?>
						<a href="<?php echo JRoute::_('dashboard/home');?>" title="<?php echo JText::_('COM_DONORWIZ_DASHBOARD');?>" data-uk-tooltip>
						<span class="uk-hidden-medium"><?php echo $name;?></span>
						<img class="uk-thumbnail uk-thumbnail-extra-mini" src="<?php echo $avatarUrl;?>" alt="<?php echo $name;?>">
						</a>
				<?php endif;?>
				
				<?php if ( !JFactory::getUser() ->guest ) :?>
					<?php $donorwizUser = new DonorwizUser( JFactory::getUser() -> id ); ?>
					<?php $progress = $donorwizUser -> getProfileCompletenessProgress(); ?>
					
					<?php if( $progress <100 ) : ?>
	
						<a href="<?php echo JRoute::_('profile/edit');?>" class="uk-button uk-button-small uk-button-blank" data-uk-tooltip title="<?php echo JText::_('COM_DONORWIZ_DASHBOARD_COMPLETE_YOUR_PROFILE_WARNING');?>">
							<i class="uk-icon-warning"></i>
						</a>
	
					<?php endif;?>
				<?php endif;?>

				
			</div>
		</div>
	</div>
</div>