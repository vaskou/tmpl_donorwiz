<?php
/**
 * @version     1.0.0
 * @package     com_moneydonations
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Charalampos Kaklamanos <dev.yesinternet@gmail.com> - http://www.yesinternet.gr
 */
// no direct access
defined('_JEXEC') or die;

include_once JPATH_ROOT.'/components/com_community/libraries/core.php';
include_once JPATH_ROOT.'/components/com_community/libraries/user.php';

$user = JFactory::getUser();
$userId = $user->get('id');



$model=$this->_models['moneydonations'];
$model->getState('list.ordering');
$model->setState('list.ordering','created');
$model->setState('list.direction','desc');


$model->setState('filter.state',1);

$this->items=$model->getItems();

//var_dump(get_class_methods($this->pagination));

?>

<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th><?php echo JText::_('COM_MONEYDONATIONS_DONOR'); ?></th>
			<th><?php echo JText::_('COM_MONEYDONATIONS_AMOUNT'); ?></th>
			<th><?php echo JText::_('COM_MONEYDONATIONS_BENEFICIARY'); ?></th>
			<th><?php echo JText::_('COM_MONEYDONATIONS_DATE'); ?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($this->items as $i => $item) : ?>
	<?php if ($item->state=='1') : ?>
		
		<?php 
		
			//var_dump($item);
			$beneficiary_id = $item->beneficiary;
			$beneficiary = CFactory::getUser($beneficiary_id);
			$beneficiary_link = CRoute::_('index.php?option=com_community&view=profile&userid='.$beneficiary_id);
			$beneficiary_received_donations_link = CRoute::_('index.php?option=com_community&view=profile&task=app&app=dwmymoneydonations&userid='.$beneficiary_id);
			$beneficiary_avatar = $beneficiary->getThumbAvatar();

			$donor_id = $item->donor; 
			$donor = CFactory::getUser($donor_id); 
			$donor_link = CRoute::_('index.php?option=com_community&view=profile&userid='.$donor_id);
			$donor_avatar = $donor->getThumbAvatar();
		?>
		
		<tr>
			<td>
				
				<?php if($item->publishmyname=='1') : ?>
					<img src="<?php echo $donor_avatar;?>" alt="">
					<?php echo '<a href="'.$donor_link.'">'.$donor->name.'</a>'; ?>
				<?php else: ?>
					<?php echo JText::_('COM_MONEYDONATIONS_ANONYMOUS'); ?>
				<?php endif;?>
			</td>
			<td>
				<div class="uk-vertical-align">
					<div class="uk-vertical-align-middle uk-height-1-1" style="max-width:100%;">
						<?php echo $item->amount.' '.$item->currency; ?>
						<?php if($userId==$donor_id):?>
							<a data-lightbox="width:600px;height:300px;" href="index.php?option=com_moneydonations&view=moneydonationinvoice&tmpl=raw"><i class="uk-icon-file-text"></i></a>
						<?php endif;?>
					</div>
				</div>
			</td>
			<td>
				<img src="<?php echo $beneficiary_avatar;?>" alt="">
				<?php echo '<a href="'.$beneficiary_link.'">'.$beneficiary->name.'</a>'; ?>
				<?php echo '<a href="'.$beneficiary_received_donations_link.'">,View all</a>'; ?>
			</td>
			<td>
				<?php echo date("d-m-Y", strtotime($item->created)) ; ?>
			</td>
			<?php $donate_cta_text=($userId==$donor_id)?'Donate again!':'Donate Now!';?>
			<td>
				<a title="Make a donation" data-lightbox="width:600;height:300;" href="index.php?option=com_moneydonations&view=moneydonationwizard&receiver=<?php echo $beneficiary_id;?>&tmpl=raw" class="uk-button uk-button-large uk-button-primary" ><?php echo $donate_cta_text ?></a>
			</td>			
		</tr>
	
	<?php endif; ?>
	<?php endforeach; ?>
	</tbody>
</table>

<!-- Start Pagination -->
<?php 
	//var_dump($this->pagination);
	echo $this->pagination->getPagesLinks(); 
					
?>


