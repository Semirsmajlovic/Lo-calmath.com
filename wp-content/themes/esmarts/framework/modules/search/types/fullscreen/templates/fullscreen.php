<div class="eltdf-fullscreen-search-holder">
	<a class="eltdf-fullscreen-search-close" href="javascript:void(0)">
		<?php echo esmarts_elated_icon_collections()->renderIcon( 'icon_close', 'font_elegant' ); ?>
	</a>
	<div class="eltdf-fullscreen-search-table">
		<div class="eltdf-fullscreen-search-cell">
			<div class="eltdf-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="eltdf-fullscreen-search-form" method="get">
					<div class="eltdf-form-holder">
						<div class="eltdf-form-holder-inner">
							<div class="eltdf-field-holder">
								<input type="text" placeholder="<?php esc_attr_e( 'Search for...', 'esmarts' ); ?>" name="s" class="eltdf-search-field" autocomplete="off"/>
							</div>
							<button type="submit" class="eltdf-search-submit"><?php echo esmarts_elated_icon_collections()->renderIcon( 'icon_search', 'font_elegant' ); ?></button>
							<div class="eltdf-line"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>