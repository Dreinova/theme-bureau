<?php
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
get_header(); ?>
<div class="container">
</div>

<?php get_footer(); ?>