<?php
$argsAlianzas = array(
  'post_type'      =>
'alianza-bureau', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' =>
'menu_order' ); $Alianzas = new WP_Query($argsAlianzas);

?>
  <h3 style="text-align: center;margin: 30px auto; font-size:25px;">Alianzas</h3>
<div class="alianzas">
    <?php if ($Alianzas->have_posts()) : ?>
        <?php 
        while ($Alianzas->have_posts()) : $Alianzas->the_post(); 
        $imagen = get_the_post_thumbnail_url($Alianzas->get_the_ID(), 'large');
        ?>
        
        <div class="alianza">
            <?php if ($imagen): ?>
             <img loading="lazy" class="evento-imagen" src="<?php echo esc_url($imagen); ?>" alt="<?php the_title(); ?>">
           <?php endif; ?>
           <?php the_title(); ?>
           <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php endif; ?>
</div>
