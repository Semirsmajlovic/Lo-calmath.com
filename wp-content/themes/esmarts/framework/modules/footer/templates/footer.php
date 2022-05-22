</div> <!-- close div.content_inner -->
	</div> <!-- close div.content -->
		<?php if($display_footer && ($display_footer_top || $display_footer_bottom)) {
			$holderClasses = $display_footer_top && $display_footer_bottom ? 'eltdf-has-both-footer' : '';
			?>
			<footer class="eltdf-page-footer <?php echo esc_attr($holderClasses); ?>">
				<?php
					if($display_footer_top) {
						esmarts_elated_get_footer_top();
					}
					if($display_footer_bottom) {
						esmarts_elated_get_footer_bottom();
					}
				?>
			</footer>
		<?php } ?>
	</div> <!-- close div.eltdf-wrapper-inner  -->
</div> <!-- close div.eltdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>