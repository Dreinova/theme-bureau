<?php
$argsBeneficios = array(
  'post_type'      =>
'beneficio-bureau', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' =>
'menu_order' ); $beneficios = new WP_Query($argsBeneficios); ?>
<div class="enfoque-bottom">
  <div class="enfoque-texto">
    <ul>
      <?php if ($beneficios->have_posts()) : ?>
      <?php while ($beneficios->have_posts()) : $beneficios->the_post(); ?>
      <li><?php the_title(); ?><?php the_content(); ?></li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </ul>
  </div>
</div>
