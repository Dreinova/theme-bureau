<?php
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
get_header(); ?>

<?php get_template_part( 'template-parts/section', 'banner' ); ?>
<?php if ( get_field('titulo_principal') ) : ?>
  <?php get_template_part( 'template-parts/section', 'destino' ); ?>
  <?php endif; ?>
  <?php get_template_part( 'template-parts/section', 'porque' ); ?>

<?php get_footer(); ?>