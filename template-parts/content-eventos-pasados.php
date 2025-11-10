<?php
// ✅ Fecha actual en formato Ymd (ejemplo: 20251030)
$hoy = date('Ymd');

// ✅ Consulta eventos con fecha anterior a hoy
$args = array(
    'post_type'      => 'eventos-bureau',
    'posts_per_page' => -1,
    'meta_key'       => 'fecha_inicial',
    'meta_query'     => array(
        array(
            'key'     => 'fecha_inicial',
            'value'   => $hoy,
            'compare' => '<',
            'type'    => 'NUMERIC'
        ),
    ),
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
);

$eventos = new WP_Query($args);

if ($eventos->have_posts()) :
    // Extraer los años únicos
    $anios = [];
    while ($eventos->have_posts()) : $eventos->the_post();
        $fecha_final = get_field('fecha_inicial');
        if ($fecha_final) {
            $anio = substr($fecha_final, 0, 4); // ✅ directo del formato Ymd
            $anios[$anio] = true;
        }
    endwhile;
    wp_reset_postdata();
    krsort($anios);
?>
<section class="eventos-pasados">
    <h2>Conoce otros eventos icónicos <strong>realizados en la ciudad</strong></h2>

    <div class="tabs-anios">
        <?php foreach ($anios as $anio => $_) : ?>
            <button data-anio="<?= esc_attr($anio) ?>" class="<?= $anio == date('Y') ? 'active' : '' ?>">
                <?= esc_html($anio) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="listado-eventos">
        <?php
        // Repetimos la consulta para listar los eventos
        $eventos = new WP_Query($args);
        while ($eventos->have_posts()) : $eventos->the_post();
            $fecha_inicial = get_field('fecha_inicial');
            $fecha_final   = get_field('fecha_final');
            $img           = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            $anio_evento   = substr($fecha_inicial, 0, 4); // ✅ directo del formato Ymd
        ?>
            <article class="evento-pasado" data-anio="<?= esc_attr($anio_evento) ?>">
                <?php if ($img) : ?>
                    <img loading="lazy" src="<?= esc_url($img) ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
                <div class="texto">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".tabs-anios button");
    const eventos = document.querySelectorAll(".evento-pasado");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            buttons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");

            const anioSeleccionado = btn.dataset.anio;
            eventos.forEach(evento => {
                evento.style.display = evento.dataset.anio === anioSeleccionado ? "flex" : "none";
            });
        });
    });

    const activo = document.querySelector(".tabs-anios button.active");
    if (activo) activo.click();
});
</script>
<?php endif; ?>
