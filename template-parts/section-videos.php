<?php 

$category = isset($args['category']) ? $args['category'] : '';

$argsVideos = array(
  'post_type'      => 'videos-bureau',
  'posts_per_page' => -1,
  'order'          => 'ASC',
  'orderby'        => 'menu_order',
);

if ( $category ) {
  $argsVideos['tax_query'] = array(
    array(
      'taxonomy' => 'categoria-video', // o 'video-category' si es una taxonomía personalizada
      'field'    => 'slug',
      'terms'    => $category,
    ),
  );
}

$videos = new WP_Query($argsVideos);
?>
<section class="section-videos">
  <?php if ($videos->have_posts()) : ?>
    <?php while ($videos->have_posts()) : $videos->the_post(); 
      $video = get_field('video');
    ?>
      <article class="videos-item" data-aos="fade-up">
        <div class="videos-item__image">
          <?php if (has_post_thumbnail()) : ?>
            <img 
              src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" 
              alt="<?php echo esc_attr(get_the_title()); ?>" 
              loading="lazy"
            >
            <?php else: ?>
            <img 
              src="https://placehold.co/250x445" 
              alt="<?php echo esc_attr(get_the_title()); ?>" 
              loading="lazy"
            >
          <?php endif; ?>
          <button class="videos-item__play" type="button" data-video="<?= $video ?>">
            <img src="https://nuevo.bogotabureau.org/wp-content/uploads/2025/10/play.avif" alt="play video" style="width: 30px;
    height: 30px;
    object-fit: contain;
    margin: 0 auto;
    position: static;
    border-radius: 0;">
          </button>
          <video class="videos-item__video" src="<?= $video ?>" controls></video>
        </div>
        <?php 
          $mostrar = get_field('mostrar_texto'); 
          if($mostrar){
        ?>
          <div class="videos-item__content">
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
          </div>
        <?php 
          }
        ?>

      </article>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>
</section>

