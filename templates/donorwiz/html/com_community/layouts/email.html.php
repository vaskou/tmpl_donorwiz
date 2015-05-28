<?php
/**
* @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<?php echo JLayoutHelper::render( 'header' , array() , JPATH_ROOT .'/components/com_donorwiz/layouts/mail/common' , null );?>

<div class="main" style="background-color:#ff0f83;color:#ffffff;padding:10px 0 10px 0;">

    <div style="max-width:480px;margin:0 auto;padding:10px;">
    	<?php echo $content; ?><br>
    </div>
</div>

<div style="max-width:480px;margin:0 auto;padding:10px;">
    
<?php
    if( !empty($userid) && !empty($recepientemail) && $email_type == 'etype_friends_invite_users' ){
        echo JText::sprintf('COM_COMMUNITY_EMAIL_INVITE_FRIEND_FOOTER_TEXT', $name, $email, $recepientemail, $sitename, $unsubscribeLink);
    } else {
        echo JText::sprintf('COM_COMMUNITY_EMAIL_FOOTER_TEXT', $name, $email,$sitename, $unsubscribeLink);
    }

?>
</div>            
<?php echo JLayoutHelper::render( 'social' , array() , JPATH_ROOT .'/components/com_donorwiz/layouts/mail/common' , null );?>
<?php echo JLayoutHelper::render( 'footer' , array() , JPATH_ROOT .'/components/com_donorwiz/layouts/mail/common' , null );?>