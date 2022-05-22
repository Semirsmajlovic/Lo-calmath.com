<div class="eltdf-tabs-navigation-wrapper">
    <ul class="nav nav-tabs">
        <?php
        foreach (esmarts_elated_options()->adminPages as $key => $page ) {
            $slug = "";
            if (!empty($page->slug)) $slug = "_tab".$page->slug;
            ?>
            <li<?php if ($page->slug == $tab) echo " class=\"active\""; ?>>
                <a href="<?php echo esc_url(get_admin_url().'admin.php?page=esmarts_elated_theme_menu'.$slug); ?>">
                    <?php if($page->icon !== '') { ?>
                        <i class="<?php echo esc_attr($page->icon); ?> eltdf-tooltip eltdf-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php echo esc_attr($page->title); ?>"></i>
                    <?php } ?>
                    <span><?php echo esc_html($page->title); ?></span>
                </a>
            </li>
        <?php
        }
        ?>
        <?php if (esmarts_elated_core_plugin_installed()) { ?>
			<li <?php if($is_backup_options_page) { echo "class='active'"; } ?>><a href="<?php echo esc_url(get_admin_url().'admin.php?page=esmarts_elated_theme_menu_backup_options'); ?>"><i class="fa fa-database eltdf-tooltip eltdf-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php esc_attr_e('Backup Options','esmarts'); ?>"></i><span><?php esc_html_e('Backup Options','esmarts'); ?></span></a></li>
			<li <?php if($is_import_page) { echo "class='active'"; } ?>><a href="<?php echo esc_url(get_admin_url().'admin.php?page=esmarts_elated_theme_menu_tabimport'); ?>"><i class="fa fa-download eltdf-tooltip eltdf-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php esc_attr_e('Import','esmarts'); ?>"></i><span><?php esc_html_e('Import','esmarts') ?></span></a></li>
        <?php } ?>
    </ul>
</div>