<?php
/*
Template Name: Página de Infraestructura
*/
get_header(); ?>
<div
  class="page-content <?php echo 'page-' . get_post_field('post_name', get_post()); ?>"
>
  <?php  get_template_part( 'template-parts/section', 'banner' ); ?>
  <div class="destacado">
    <div class="videobg">
        <div class="text">
            <h4><?= get_field("frase_destacada") ?></h4>
            <a href="<?= get_field("brochure") ?>" class="btn-secondary"><?= get_field("texto_boton_brochure") ?></a>
        </div>
    </div>
  </div>
  <?php get_template_part( 'template-parts/content', 'beneficios' ); ?>
  <?php get_template_part( 'template-parts/section', 'destino' ); ?>
  <?php get_template_part( 'template-parts/content', 'alianzas' ); ?>
</div>

<?php get_footer(); ?>
