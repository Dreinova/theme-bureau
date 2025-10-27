<?php
$argsVenues = array(
  'post_type'      => 'venues-bureau',
  'posts_per_page' => -1,
  'order'          => 'ASC',
  'orderby'        => 'menu_order'
);

$venues = new WP_Query($argsVenues);
?>
<section class="section-venues">
    <h3>Otros <strong>Venues incomparables</strong></h3>
  <div class="container">
    <?php if ($venues->have_posts()) : ?>
      <?php while ($venues->have_posts()) : $venues->the_post();
       $enlace = get_field('enlace');
      ?>
        <a href="<?=$enlace?>" target="_blank" class="venues-item" data-aos="fade-up"> 
          <div class="venues-item__image">
            <?php if (has_post_thumbnail()) : ?>
              <img 
                src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" 
                alt="<?php echo esc_attr(get_the_title()); ?>" 
                loading="lazy"
              >
            <?php endif; ?>
          </div>

          <div class="venues-item__content">
            <p><?php the_title(); ?></p>
          </div>
            </a>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>No se encontraron elementos de “¿Por qué Bogotá?”.</p>
    <?php endif; ?>
  </div>
  <!-- <div class="btn-container">
      <a href="" class="btn-primary">Venues no convencionales</a>

  </div> -->
</section>
