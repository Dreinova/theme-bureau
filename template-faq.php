<?php
/*
Template Name: Página de FAQ
*/
$args = array(
    'post_type'      => 'preguntas-bureau',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

$faq_query = new WP_Query($args);

if ($faq_query->have_posts()) :
?>
<?php
get_header(); ?>
<div
  class="page-content <?php echo 'page-' . get_post_field('post_name', get_post()); ?>"
>
<section class="faq">
  <h2>Preguntas frecuentes</h2>
  <div class="faq-list">
    <?php while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
      <details class="faq-item">
        <summary><?php the_title(); ?></summary>
        <div class="faq-content">
          <?php the_content(); ?>
        </div>
      </details>
    <?php endwhile; ?>
  </div>
</section>
<?php
endif;
wp_reset_postdata();
?>
</div>
  

<?php get_footer(); ?>

