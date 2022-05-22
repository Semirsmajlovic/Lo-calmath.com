<?php if ( esmarts_elated_core_plugin_installed() ) { ?>
	<div class="eltdf-blog-like">
		<?php if( function_exists('esmarts_elated_get_like') ) esmarts_elated_get_like(); ?>
	</div>
<?php } ?>