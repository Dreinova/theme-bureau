<?php
$argsHoteles = array(
  'post_type'      => 'hotel-bureau',
  'posts_per_page' => -1,
  'order'          => 'ASC',
  'orderby'        => 'menu_order'
);

$hoteles = new WP_Query($argsHoteles);
?>

<section class="section-hoteles">
  <h3>Hoteles perfectos para tu evento</h3>
  <div class="container">
    <?php if ($hoteles->have_posts()) : ?>
      <?php 
        // Arrays para separar los hoteles con y sin logo
        $hoteles_con_logo = [];
        $hoteles_sin_logo = [];

        while ($hoteles->have_posts()) : $hoteles->the_post();
          $logo = get_field('logo');
          $data = [
            'id' => get_the_ID(),
            'titulo' => get_the_title(),
            'contenido' => get_the_content(),
            'logo' => $logo,
            'ubicacion' => get_field('ubicacion'),
            'cantidad_personas' => get_field('cantidad_personas'),
            'numero_estrellas' => get_field('numero_estrellas'),
            'enlace' => get_field('enlace'),
          ];

          if ($logo) {
            $hoteles_con_logo[] = $data;
          } else {
            $hoteles_sin_logo[] = $data;
          }
        endwhile;

        // Unir: primero los que tienen logo, luego los que no
        $hoteles_ordenados = array_merge($hoteles_con_logo, $hoteles_sin_logo);
      ?>

      <?php foreach ($hoteles_ordenados as $hotel) : ?>
        <a href="<?= esc_url($hotel['enlace']); ?>" target="_blank" class="hoteles-item">
          <div class="hoteles-card">
            
            <!-- Frente (logo) -->
            <div class="hoteles-card__front">
              <?php if ($hotel['logo']): ?>
                <img src="<?= esc_url($hotel['logo']); ?>" alt="<?= esc_attr($hotel['titulo']); ?>">
              <?php else: ?>
                <img 
                  src="https://placehold.co/50x50" 
                  alt="<?= esc_attr($hotel['titulo']); ?>" 
                  loading="lazy"
                >
              <?php endif; ?>
            </div>

            <!-- Reverso (info) -->
            <div class="hoteles-card__back">
              <div class="hoteles-item__content">
                <div class="numero_estrellas">
                  <?php
                  if ($hotel['numero_estrellas']) {
                    for ($i = 0; $i < $hotel['numero_estrellas']; $i++) {
                      echo '<img src="/wp-content/uploads/2025/10/star.avif" alt="Estrella" />';
                    }
                  }
                  ?>
                </div>

                <h4><?= esc_html($hotel['titulo']); ?></h4>
                <?= wp_kses_post($hotel['contenido']); ?>

                <div class="flex">
                  <?php if ($hotel['ubicacion']) : ?>
                    <div class="ubicacion">
                      <img src="/wp-content/uploads/2025/10/ubicacion.avif" alt="ubicacion">
                      <?= esc_html($hotel['ubicacion']); ?>
                    </div>
                  <?php endif; ?>
                  <?php if ($hotel['cantidad_personas']) : ?>
                    <div class="cantidad_personas">
                      <img src="/wp-content/uploads/2025/10/personas.avif" alt="cantidad_personas">
                      <?= esc_html($hotel['cantidad_personas']); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>

          </div>
        </a>
      <?php endforeach; ?>

      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>

  <a href="/obten-asesoria-de-expertos/" class="btn-secondary">Solicita asesoría gratuita</a>
</section>
