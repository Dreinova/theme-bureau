<?php
/*
Template Name: Página de Haz tu evento
*/
get_header(); ?>
<div
  class="page-content <?php echo 'page-' . get_post_field('post_name', get_post()); ?>"
>
  <?php get_template_part( 'template-parts/section', 'banner' ); ?>
  <div class="description">
    <?php $description = get_the_content($post->ID); ?>
    <?= $description ?>
  </div>
  <?php get_template_part( 'template-parts/section', 'videos', array( 'category' => 'haz-tu-evento-en-bogota' )  ); ?>
  <!-- <div class="container"> -->
    <?php 
    // get_template_part('template-parts/content', 'eventos-pasados'); 
    ?>
  <!-- </div> -->

  <?php get_template_part( 'template-parts/section', 'hoteles' ); ?>
  <?php get_template_part( 'template-parts/section', 'venues' ); ?>
</div>

<?php get_footer(); ?>
