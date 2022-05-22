<section class="eltdf-side-menu">
	<div class="eltdf-close-side-menu-holder">
		<a class="eltdf-close-side-menu" href="#" target="_self">
			<?php echo esmarts_elated_icon_collections()->renderIcon( 'icon_close', 'font_elegant' ); ?>
		</a>
	</div>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>