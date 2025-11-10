<?php
$hoy = date('Ymd'); // Ejemplo: 20251030

$args = array(
    'post_type'      => 'eventos-bureau',
    'posts_per_page' => -1,
    'meta_key'       => 'fecha_inicial',
    'orderby'        => 'meta_value_num', // ✅ importante para Ymd numérico
    'order'          => 'ASC',
    'meta_query'     => array(
        array(
            'key'     => 'fecha_inicial',
            'value'   => $hoy,
            'compare' => '>=',  // ✅ solo eventos de hoy o futuros
            'type'    => 'NUMERIC',
        ),
    ),
);

$eventos = new WP_Query($args);

if ($eventos->have_posts()) :
?>
<section class="eventos-proximos">
    <h2>Eventos próximos <strong>en Bogotá</strong></h2>
    <div class="grid-eventos">
        <?php while ($eventos->have_posts()) : $eventos->the_post(); ?>
            <?php
            $fecha_inicial = get_field('fecha_inicial');
            $fecha_final   = get_field('fecha_final');
            $lugar         = get_field('lugar');
            $img           = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            ?>
            <article class="evento-card" data-aos="fade-up">
                <?php if ($img): ?>
                    <img loading="lazy" src="<?= esc_url($img) ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
                <div class="evento-info">
                    <?php if ($lugar): ?>
                        <p class="lugar">
                            <img loading="lazy" src="/wp-content/uploads/2025/10/location.avif" alt="location">
                            <?= esc_html($lugar) ?>
                        </p>
                    <?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <div class="fechas">
                        <?php if ($fecha_inicial): ?>
                            <div class="inicial">
                                <span><?= date_i18n('d', strtotime($fecha_inicial)) ?></span>
                                <span><?= date_i18n('F', strtotime($fecha_inicial)) ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ($fecha_final): ?>
                            <span>-</span>
                            <div class="final">
                                <span><?= date_i18n('d', strtotime($fecha_final)) ?></span>
                                <span><?= date_i18n('F', strtotime($fecha_final)) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>
