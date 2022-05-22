<?php

esmarts_elated_get_single_post_format_html($blog_single_type);

do_action('esmarts_elated_action_after_article_content');

esmarts_elated_get_module_template_part('templates/parts/single/author-info', 'blog');

esmarts_elated_get_module_template_part('templates/parts/single/single-navigation', 'blog');

esmarts_elated_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

esmarts_elated_get_module_template_part('templates/parts/single/comments', 'blog');