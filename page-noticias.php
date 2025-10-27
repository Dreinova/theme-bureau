<?php
/*
Template Name: Página de Noticias
*/
get_header(); ?>
<div
  class="page-content <?php echo 'page-' . get_post_field('post_name', get_post()); ?>"
>
<h2>NOTICIAS</h2>
<?php get_template_part('template-parts/content', 'noticias'); ?>
</div>
<?php get_footer(); ?>