<?php
$args = array(
  'post_type'      => 'porque-bureau',
  'posts_per_page' => -1,
  'order'          => 'ASC',
  'orderby'        => 'menu_order'
);

$porque = new WP_Query($args);
?>

<section class="section-porque">
    <h3>¿Por qué Bogotá?</h3>
  <div class="container">
    <?php if ($porque->have_posts()) : ?>
      <?php while ($porque->have_posts()) : $porque->the_post(); ?>
        <article class="porque-item">
          <div class="porque-item__image">
            <?php if (has_post_thumbnail()) : ?>
              <img 
                src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" 
                alt="<?php echo esc_attr(get_the_title()); ?>" 
                loading="lazy"
              >
            <?php endif; ?>
          </div>

          <div class="porque-item__content">
            <h4><?php the_title(); ?></h4>
            <div class="porque-item__text">
              <?php the_content(); ?>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>No se encontraron elementos de “¿Por qué Bogotá?”.</p>
    <?php endif; ?>
  </div>
</section>
