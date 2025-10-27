<?php
  $fecha_inicial = get_field('fecha_inicial');
  $fecha_final = get_field('fecha_final');
  $lugar = get_field('lugar');
  $imagen = get_the_post_thumbnail_url(get_the_ID(), 'large');
?>

<article class="evento-interno">
  <div class="container">
    <header class="evento-header">
      <h1 class="evento-titulo"><?php the_title(); ?></h1>
      <?php if ($imagen): ?>
        <img loading="lazy" class="evento-imagen" src="<?php echo esc_url($imagen); ?>" alt="<?php the_title(); ?>">
      <?php endif; ?>
    </header>

    <div class="evento-info">
      <?php if ($fecha_inicial): ?>
        <p><strong>Fecha inicial:</strong> <?php echo esc_html($fecha_inicial); ?></p>
      <?php endif; ?>
      <?php if ($fecha_final): ?>
        <p><strong>Fecha final:</strong> <?php echo esc_html($fecha_final); ?></p>
      <?php endif; ?>
      <?php if ($lugar): ?>
        <p><strong>Lugar:</strong> <?php echo esc_html($lugar); ?></p>
      <?php endif; ?>
    </div>

    <div class="evento-contenido">
      <?php the_content(); ?>
    </div>
  </div>
</article>
