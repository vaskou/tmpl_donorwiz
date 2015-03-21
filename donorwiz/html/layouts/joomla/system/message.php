<?php

defined('_JEXEC') or die;

$msgList = $displayData['msgList'];

?>

<?php

if (is_array($msgList) && !empty($msgList))
{

	foreach ($msgList as $type => $msgs){

		echo '<script type="text/javascript">';

		if (!empty($msgs))
		{
			echo	'var type="info";';

			if( $type == 'error')
			{
				echo	'type="danger";';
			}

			if( $type == 'warning')
			{
				echo	'type="danger";';
			}
			if( $type == 'success')
			{
				echo	'type="success";';
			}

				echo	'var message="";';
			//echo 	'message+="'.JText::_($type).'";';
			foreach ($msgs as $msg)
			{
				echo 	'message+="<p>'.$msg.'</p>";';
			}
		}

		echo '	UIkit.notify({';
		echo '		message	: message,';
		echo '		status	: type,';
		echo '		timeout	: 5000';
		echo '	});';

		echo '</script>';
	}

}

?>