<?php
/*
Template Name: Página de eventos
*/
get_header(); ?>
<div
  class="page-content <?php echo 'page-' . get_post_field('post_name', get_post()); ?>"
>
  <?php get_template_part( 'template-parts/section', 'banner' ); ?>

<main class="page-eventos">
    <?php get_template_part('template-parts/content', 'eventos-proximos'); ?>
    <?php get_template_part('template-parts/content', 'eventos-pasados'); ?>
  </main>
  <div class="testimonios">
    <div class="container">
      <h2>Casos <strong>de éxito</strong></h2>
      <?php get_template_part( 'template-parts/section', 'videos', array( 'category' => 'casos-de-exito' )  ); ?>
    </div>
  </div>

<?php get_footer(); ?>
