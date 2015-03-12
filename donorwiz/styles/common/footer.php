<footer class="tm-footer uk-margin-remove">
	<div class="uk-container uk-container-center" style="max-width: 1200px!important;">

		<?php
			echo $this['widgets']->render('footer');
			echo $this['widgets']->render('footer-copyright');
			$this->output('warp_branding');
			echo $this['widgets']->render('debug');
		?>
		<div class="uk-width-1-1 uk-text-center uk-margin-small">
			<a data-uk-smooth-scroll href="#"><i class="uk-icon-chevron-up uk-icon-large uk-text-muted"></i></a>
		</div>
	</div>
</footer>