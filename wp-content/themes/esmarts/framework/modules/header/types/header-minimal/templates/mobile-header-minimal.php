<?php do_action('esmarts_elated_action_before_mobile_header'); ?>

<header class="eltdf-mobile-header">
	<?php do_action('esmarts_elated_action_after_mobile_header_html_open'); ?>
	
	<div class="eltdf-mobile-header-inner">
		<div class="eltdf-mobile-header-holder">
			<div class="eltdf-grid">
				<div class="eltdf-vertical-align-containers">
					<div class="eltdf-position-left">
						<div class="eltdf-position-left-inner">
							<?php esmarts_elated_get_mobile_logo(); ?>
						</div>
					</div>
					<div class="eltdf-position-right">
						<div class="eltdf-position-right-inner">
							<a href="javascript:void(0)" class="eltdf-fullscreen-menu-opener">
							<span class="eltdf-fm-lines">
								<span class="eltdf-fm-line eltdf-line-1"></span>
								<span class="eltdf-fm-line eltdf-line-2"></span>
								<span class="eltdf-fm-line eltdf-line-3"></span>
							</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php do_action('esmarts_elated_action_before_mobile_header_html_close'); ?>
</header>

<?php do_action('esmarts_elated_action_after_mobile_header'); ?>