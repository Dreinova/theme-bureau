<?php
$argsTeam = array(
  'post_type'      => 'equipo-bureau',
  'posts_per_page' => -1,
  'order'          => 'ASC',
  'orderby'        => 'menu_order'
);

$team = new WP_Query($argsTeam);
?>

<section class="section-team">
  <h3>Conoce <strong>nuestro equipo</strong></h3>
  <div class="container">
    <?php if ($team->have_posts()) : ?>
      <?php 
        $spread = 120; // separación horizontal
        $curzve = 0;   // caída vertical
        $center = 1;   // posición 1 va al centro
      ?>

      <?php while ($team->have_posts()) : $team->the_post(); 
        $pos = intval(get_field('posicion'));
        $cargo = get_field('cargo');

        // el 1 es el centro
        if ($pos === $center) {
          $offsetX = 0;
          $offsetY = 0;
          $zIndex = 100;
        } else {
          // calcula distancia desde el centro
          $distance = $pos - $center;

          // alterna lados: 2 derecha, 3 izquierda, 4 derecha, 5 izquierda...
          $side = ($distance % 2 === 0) ? -1 : 1;
          $offsetX = ceil($distance / 2) * $spread * $side;
          $offsetY = abs(ceil($distance / 2)) * $curve;
          $zIndex = 100 - abs($distance);
        }
      ?>
      
        <a href="mailto:bureau.bogota@investinbogota.org;" 
          class="team-item" 
          style="--xpos:<?=$offsetX?>px;z-index:<?=$zIndex?>; transform: translateX(<?=$offsetX?>px) translateY(<?=$offsetY?>px);"
        >
          <div class="team-item__image">
            <?php if (has_post_thumbnail()) : ?>
              <img 
                src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" 
                alt="<?= esc_attr(get_the_title()); ?>" 
                loading="lazy"
              >
            <?php endif; ?>
          </div>

          <div class="team-item__content">
            <h4><?=$cargo?></h4>
            <div class="team-item__text">
              <?php the_title(); ?>
            </div>
          </div>
            </a>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <div class="absolute-form" ><img style="position: absolute;
    bottom: -50px;
    left: -136px;
    width: 100vw;
    height: 100px;
    z-index: 1000;" src="/wp-content/uploads/2025/10/forma.avif" alt="Forma Team"></div>
  </div>
  <p>Somos el <strong>Bureau de Convenciones</strong> de 
  <a href="https://es.investinbogota.org/" target="_blank">
Invest in Bogotá
  </a>
  , un equipo experto que impulsa los grandes encuentros internacionales y proyecta a la ciudad ante el mundo.
</p>
<p><strong>Tu evento merece una ciudad a su altura ¡Y esa ciudad es Bogotá!</strong></p>
</section>
