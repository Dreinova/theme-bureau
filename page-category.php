<?php
/*
Template Name: Página de Categoría
*/
get_header(); ?>
<div
  class="page-content <?php echo 'page-' . get_post_field('post_name', get_post()); ?>"
>
  <?php  get_template_part( 'template-parts/section', 'banner' ); ?>
  <div class="destacado">
    <div class="videobg">
        <video src="<?= get_field("video_brochure") ?>" loop muted autoplay></video>
        <div class="container">
          <div class="text">
              <h4><?= get_field("frase_destacada") ?></h4>
              <a target="_blank" href="<?= get_field("brochure") ?>" class="btn-secondary"><?= get_field("texto_boton_brochure") ?></a>
          </div>

        </div>
    </div>
  </div>
  <?php get_template_part( 'template-parts/section', 'destino' ); ?>
    <div class="distrito-ferial">
      <div class="container">
        <div class="content">
          <?= get_field('texto_un_distrito_ferial') ?>
          <a href="<?= get_field('link_boton') ?>" class="btn-primary"
            ><?= get_field('texto_boton') ?></a
          >
        </div>
        <div class="image">
          <?php get_template_part( 'template-parts/section', 'videos', array( 'category' => 'distrito-ferial' )  ); ?>
        </div>
      </div>
      <?php get_template_part( 'template-parts/section', 'videos', array( 'category' => 'distrito-ferial-2' )  ); ?>
    </div>
</div>

<?php get_footer(); ?>
