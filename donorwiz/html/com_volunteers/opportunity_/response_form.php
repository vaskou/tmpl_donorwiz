<?php
	defined('JPATH_BASE') or die;
?>

<h1>I want to help</h1>


<form class="uk-form" method="post" action="<?php echo JURI::getInstance()->toString() ; ?>">

	<fieldset data-uk-margin>

		<div class="uk-form-row uk-width-1-1">
			<textarea name="message" class="uk-width-1-1" cols="" rows="10" maxlength="400" placeholder="Fill in our text here"><?php echo $displayData['message']; ?></textarea>
			<p class="uk-form-help-block">Say with few words why you would be interested to help.</p>
		</div>
		
		<button class="uk-button uk-button-primary uk-button-large" type="submit">Submit</button>
		<a class="uk-modal-close" href="" >Cancel</a>
	
	</fieldset>

</form>





