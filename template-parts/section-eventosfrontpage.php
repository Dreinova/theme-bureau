<?php
$hoy = date('Ymd');

$args = array(
    'post_type' => 'eventos-bureau',
    'posts_per_page' => 3,
    'meta_key' => 'fecha_inicial',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'fecha_inicial',
            'value' => "20251020",
            'compare' => '>=',
            'type' => 'NUMERIC'
        )
    )
);

$eventos = new WP_Query($args);

if ($eventos->have_posts()) :
?>
<section class="eventos-proximos">
    <div class="text">
        <h2><strong>Eventos</strong> próximos en Bogotá</h2>
        <p>La agenda de eventos del Bureau está en constante movimiento, conectando   A Bogotá con el mundo. Desde congresos vibrantes hasta encuentros de talla internacional, cada evento es una puerta abierta al turismo MICE y a la experiencia única de nuestra ciudad.</p>
        <a href="/bogota-sede-de-grandes-eventos/" class="btn-primary">Ver toda la agenda de eventos</a>
    </div>
    <div class="grid-eventos">
        <?php while ($eventos->have_posts()) : $eventos->the_post(); ?>
            <?php
            $fecha_inicial = get_field('fecha_inicial');
            $fecha_final   = get_field('fecha_final');
            $lugar         = get_field('lugar');
            $img           = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            ?>
            <article class="evento-card">
                <img loading="lazy" src="<?= esc_url($img) ?>" alt="<?php the_title(); ?>">
                <div class="evento-info">
                    <p class="lugar"><img loading="lazy" src="/wp-content/uploads/2025/10/locationw.avif" alt="location"> <?= esc_html($lugar) ?></p>
                    <h3><?php the_title(); ?></h3>
                    <div class="fechas">
                        <div class="inicial">
                            <span><?= date_i18n('d', strtotime($fecha_inicial)) ?></span>
                            <span><?= date_i18n('F', strtotime($fecha_inicial)) ?></span>
                        </div>
                        <span>-</span>
                        <div class="final">
                            <span><?= date_i18n('d', strtotime($fecha_final)) ?></span>
                            <span><?= date_i18n('F', strtotime($fecha_final)) ?></span>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>
