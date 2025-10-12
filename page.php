<?php
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
get_header(); ?>
<?php get_template_part( 'template-parts/section', 'banner' ); ?>
<?php get_footer(); ?>