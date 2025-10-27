<?php
// Obtener ID de la página de inicio
$home_id = get_option('page_on_front');

// Campos principales desde la página de inicio
$titulo = get_field('titulo_principal', $home_id);
$resaltado = get_field('texto_resaltado', $home_id);
$boton_texto = get_field('boton_texto', $home_id);
$boton_enlace = get_field('boton_enlace', $home_id);

// Campo JSON con estadísticas
$estadisticas_json = get_field('estadisticas_json', $home_id);
?>

<section class="section-destino-ideal">
  <div class="container">
    <?php if ($titulo): ?>
      <h2>
        <?php 
          echo wp_kses_post(str_replace($resaltado, "<span class='highlight'>$resaltado</span>", $titulo));
        ?>
      </h2>
    <?php endif; ?>

    <?php
    // Mostrar estadísticas si existen
    if ($estadisticas_json) {
      $stats = json_decode($estadisticas_json, true);
      if ($stats && is_array($stats)): ?>
        <div class="stats-grid">
          <?php foreach ($stats as $i => $item): ?>
            <div class="stat" data-aos="fade-up" data-aos-delay="<?= $i ?>00">
              <h3><?php echo esc_html($item['valor']); ?></h3>
              <p><?php echo esc_html($item['descripcion']); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif;
    }
    ?>

    <?php if ($boton_texto && $boton_enlace): ?>
      <div class="cta">
        <a href="<?php echo esc_url($boton_enlace); ?>" class="btn-primary">
          <?php echo esc_html($boton_texto); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>
