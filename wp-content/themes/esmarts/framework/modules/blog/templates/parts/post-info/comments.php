<?php if(comments_open()) { ?>
	<div class="eltdf-post-info-comments-holder">
		<a itemprop="url" class="eltdf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<i class="icon_comment"></i>
			<?php comments_number('0', '1', '%'); ?>
		</a>
	</div>
<?php } ?>