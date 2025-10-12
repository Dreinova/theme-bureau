<?php
$titulo = get_field('titulo_principal');
$resaltado = get_field('texto_resaltado');
$boton_texto = get_field('boton_texto');
$boton_enlace = get_field('boton_enlace');
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

    <div class="stats-grid">
      <?php for ($i = 1; $i <= 4; $i++): 
          $valor = get_field("valor_$i");
          $descripcion = get_field("descripcion_$i");
          if ($valor && $descripcion): ?>
            <div class="stat">
              <h3><?php echo esc_html($valor); ?></h3>
              <p><?php echo esc_html($descripcion); ?></p>
            </div>
          <?php endif;
        endfor; ?>
    </div>

    <?php if ($boton_texto && $boton_enlace): ?>
      <div class="cta">
        <a href="<?php echo esc_url($boton_enlace); ?>" class="btn-primary" target="<?php echo esc_attr($boton_enlace); ?>">
          <?php echo esc_html($boton_texto); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>
