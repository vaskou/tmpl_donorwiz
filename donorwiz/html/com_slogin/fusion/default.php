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
JFactory::getLanguage()->load('com_donorwiz');
?>
<div class="login uk-container uk-container-center uk-text-center" style="max-width:600px;">

    <h1>
        <?php echo JText::_('COM_SLOGIN_FUSION'); ?>
    </h1>

	<?php if ( $this->user->get('id') != 0 ) :?>
	<h2>
        <?php echo $this->user->get('username'); ?>
    </h2>
	<?php endif;?>
	
    <div class="login-description">
        <?php echo JText::_('COM_SLOGIN_FUSION_DESC'); ?>
    </div>
    
	<?php if ($this->user->get('id') == 0): ?>

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
					'layoutParams' => array()
				), 
				JPATH_ROOT .'/components/com_donorwiz/layouts/popup' , 
				null ); 
			?>

    <?php else : ?>

    <div id="slogin-buttons" class="slogin-buttons">
        <?php
        foreach($this->attachedProviders as $provider) :

			if($provider['plugin_name'] == 'ulogin')
                continue;

            $linkParams = '';
            if(isset($provider['params'])){
                foreach($provider['params'] as $k => $v){
                    $linkParams .= ' ' . $k . '="' . $v . '"';
                }
            }
            ?>
        <a class="uk-button uk-button-large uk-width-1-1 uk-margin-small-top <?php echo $provider['plugin_name'];?>slogin" <?php echo $linkParams;?> href="<?php echo JRoute::_($provider['link']);?>">
            <i class="uk-margin-small-right uk-icon-<?php echo $provider['plugin_name'];?>"></i>
			<?php echo JText::_('COM_SLOGIN_ATTACH_PROVIDERS')?>
            <i class="uk-margin-small-left uk-icon-check"></i>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="slogin-clear"></div>
    <div id="slogin-buttons" class="slogin-buttons">
        <?php foreach($this->unattachedProviders as $provider) : ?>
        <a class="uk-button uk-button-large uk-width-1-1 uk-margin-small-top <?php echo $provider['plugin_name'];?>slogin" href="<?php echo JRoute::_('index.php?option=com_slogin&task=detach_provider&plugin='.$provider['plugin_name']);?>">
            <i class="uk-margin-small-right uk-icon-<?php echo $provider['plugin_name'];?>"></i>
			<?php echo JText::_('COM_SLOGIN_DETACH_PROVIDERS')?>
            <i class="uk-margin-small-left uk-icon-close"></i>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="slogin-clear"></div>

    <?php endif; ?>
</div>