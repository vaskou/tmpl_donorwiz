<?php
/**
 * @version     1.0.0
 * @package     com_volunteers
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Charalampos Kaklamanos <dev.yesinternet@gmail.com> - http://www.yesinternet.gr
 */
// no direct access
defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_users/helpers/route.php';

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');




//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_volunteers', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_volunteers.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_volunteers' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}

//var_dump ($this->item);
//JHtml::script('https://maps.googleapis.com/maps/api/js?key=API_KEY', false);
include_once JPATH_ROOT.'/components/com_community/libraries/core.php';
include_once JPATH_ROOT.'/components/com_community/libraries/messaging.php';
// Add a onclick action to any link to send a message
// Here, we assume $usrid contain the id of the user we want to send message to
$onclick = CMessaging::getPopup($this->item->created_by);
//echo '<a onclick="'.$onclick.'" href="#">Send message</a>';
JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_volunteers/models', 'VolunteersModel');
$opportunity = JModelLegacy::getInstance('OpportunityForm', 'VolunteersModel', array('ignore_request' => true));

$table = $opportunity->getTable();
	
if ($table->load($this->item->id)) {
	// Convert the JTable to a clean JObject.
	$properties = $table->getProperties(1);
	$_this = JArrayHelper::toObject($properties, 'JObject');
}


//var_dump ( $this->item);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//Secure POST
	$trusted_vars = array ('message');
	
	foreach ($_POST as $key => $value) {
		if( !in_array( $key , $trusted_vars ) )
			unset( $_POST[$key] );
		else
			$_POST[$key] = strip_tags( $_POST[$key] );
			
		if($key == 'message')
			$_POST[$key] = mb_substr($_POST[$key], 0, 400, 'UTF-8');
	}
	
	$responders_ids = explode( "," , $this->item->responders_ids );
	if(!in_array(JFactory::getUser()->id, $responders_ids))
		array_push($responders_ids,JFactory::getUser()->id);
		
	$responders_data_new = array();

	
	$responders_data_new  = $_POST;
	$responders_data = ($this->item->responders_data=='') ? array():unserialize ( base64_decode( $this->item->responders_data ) ) ;
	$responders_data [JFactory::getUser()->id] = $responders_data_new;

	$data=array();
	$data['id']=$this->item->id;
	
	$data['responders_ids'] = implode(",", $responders_ids) ;
	
	$data['responders_data']=  base64_encode( serialize ( $responders_data ) );
	
	
	//$data ['age'] = json_encode(explode( ","  ,$this->item->age ));
	
	
	error_reporting(E_ALL & ~E_NOTICE);
	$opportunity->save($data);
	error_reporting(E_ALL );
	
	
	require_once JPATH_ROOT .'/components/com_community/libraries/core.php';
	
	$actor = CFactory::getUser();
	
	//var_dump ( $actor );
	$params = new CParameter('');
	CNotificationLibrary::add( 'system_messaging' , '965' , $actor->id , 'Notification Subject' , 'This is the notification body message' , '' , $params );
	
	}


?>

<?php if ($this->item && $this->item->state == 1) : ?>

	<div class="uk-article">
		<h1 class="uk-article-title"><?php echo $this->item->title; ?></h1>
		<p class="uk-article-meta"><?php echo JText::_('COM_VOLUNTEERS_FORM_LBL_OPPORTUNITY_CREATED_BY'); ?> <?php echo $this->item->created_by; ?>, Posted in <?php echo $this->item->category; ?>, <?php echo $this->item->age; ?></p>
		<p class="uk-article-meta"><?php echo JText::_('COM_VOLUNTEERS_FORM_LBL_OPPORTUNITY_DATE_START'); ?> <?php echo $this->item->date_start; ?>, <?php echo JText::_('COM_VOLUNTEERS_FORM_LBL_OPPORTUNITY_DATE_END'); ?> <?php echo $this->item->date_end; ?></p>
		<p><?php echo $this->item->description; ?></p>
		
		<div class="uk-panel">
			<div class="uk-panel-badge uk-badge"><?php echo JText::_('COM_VOLUNTEERS_FORM_LBL_OPPORTUNITY_ADDRESS'); ?></div>
			<h3 class="uk-panel-title"><?php echo JText::_('COM_VOLUNTEERS_FORM_LBL_OPPORTUNITY_ADDRESS'); ?></h3>
			<p><?php echo $this->item->address; ?></p>
			<p><?php echo $this->item->lat; ?></p>
			<p><?php echo $this->item->lng; ?></p>
		</div>
		
		<?php if($this->item->created_by!=JFactory::getUser()->id):?>
			<?php if(JFactory::getUser()->id=='0'):?>
			<a href="#article-login" data-uk-modal class="uk-button uk-button-primary uk-button-large" href="">I want to HELP</a>
			<?php endif;?>
			<?php if(JFactory::getUser()->id!='0'):?>
			<a href="#i-want-to-help" data-uk-modal class="uk-button uk-button-primary uk-button-large" href="">I want to HELP</a>
			<?php endif;?>		
		<?php endif; ?>
		
	<?php if($this->item->created_by==JFactory::getUser()->id):?>
	<div id="responses" class="uk-grid" data-uk-grid-margin="">

		<ul class="uk-list uk-list-striped uk-width-medium-1-1">
			<li>List item 1</li>
			<li>List item 2</li>
			<li>List item 3</li>
		</ul>
	</div>
	<?php endif; ?>

	
	


	</div>
	

	<div class="uk-grid" data-uk-grid-margin="">
		<div class="uk-width-medium-1-3">
		<div class="uk-panel uk-panel-box">
			<h3 class="uk-panel-title"><i class="uk-icon-smile-o"></i> Κατηγορία</h3>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		</div>
		</div>
		<div class="uk-width-medium-1-3">
		<div class="uk-panel uk-panel-box">
			<h3 class="uk-panel-title"><i class="uk-icon-calendar"></i> Πότε</h3>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		</div>
		</div>
		<div class="uk-width-medium-1-3">
		<div class="uk-panel uk-panel-box">
			<h3 class="uk-panel-title"><i class="uk-icon-map-marker"></i> Που;</h3>
			<?php if( $_this -> category == 'virtual') :?>
				This is a Virtual Opportunity, with no fixed address.
			<?php else: ?>
				<?php echo $this->item->address; ?>
			<?php endif; ?>
		</div>
		</div>
	</div>
	
	<?php if($this->item->created_by==JFactory::getUser()->id):?>
	<div id="responses" class="uk-grid" data-uk-grid-margin="">

	</div>
	<?php endif; ?>
	
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_volunteers&task=opportunity.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_VOLUNTEERS_EDIT_ITEM"); ?></a>
	<?php endif; ?>
	
	<?php if(JFactory::getUser()->authorise('core.delete','com_volunteers.opportunity.'.$this->item->id)):?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_volunteers&task=opportunity.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_VOLUNTEERS_DELETE_ITEM"); ?></a>
	<?php endif; ?>
    
	<?php
else:
    echo JText::_('COM_VOLUNTEERS_ITEM_NOT_LOADED');
endif;
?>


<?php
jimport('joomla.application.module.helper');
    // this is where you want to load your module position
    $modules = JModuleHelper::getModules('article-login'); 
echo '<div id="article-login" class="uk-modal" style="display:none;">';    

		echo '<div class="uk-modal-dialog">';
		echo '<a class="uk-modal-close uk-close"></a>';
		echo '<h1>Login</h1>';
		
		foreach($modules as $module)
    {
		

		echo JModuleHelper::renderModule($module);
		
    }
	
			echo '</div>';

echo '</div>';
?>

<?php if(JFactory::getUser()->id!='0'):?>

	<?php
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		$message=$_POST['message'];
	}
	else{
		
		$responders_data = ( $this->item->responders_data=='') ? array() : unserialize ( base64_decode( $this->item->responders_data) ) ;
		if(isset($responders_data [JFactory::getUser()->id] ['message']))
			$message = $responders_data [JFactory::getUser()->id] ['message'] ;
		else
			$message='';
	}

	
	?>
	
<div id="i-want-to-help" class="uk-modal" style="display:none;">
	<div class="uk-modal-dialog">
		<a class="uk-modal-close uk-close"></a>

		<?php echo JLayoutHelper::render('response_form', array('message' => $message), dirname(__FILE__)); ?>
	</div>
</div>
<?php endif;?>	


