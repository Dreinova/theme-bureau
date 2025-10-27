<?php
// Obtiene la ID de la página actual
$current_id = get_the_ID();

// Consulta banners que tengan asignada esta página
$args = array(
    'post_type'      => 'banners-bureau',
    'posts_per_page' => 1,
    'meta_query'     => array(
        array(
            'key'     => 'pagina_en_donde_aparece', // nombre del campo ACF
            'value'   => '"' . $current_id . '"', // búsqueda precisa (para relaciones múltiples)
            'compare' => 'LIKE'
        )
    )
);

$banners = new WP_Query($args);

if ($banners->have_posts()) :
    while ($banners->have_posts()) : $banners->the_post();

        // Campos ACF
        $imagen_fondo      = get_field('imagen');
        $titulo            = get_field('texto_banner'); // Texto completo
        $palabra_resaltada = get_field('texto_resaltado'); // Solo la palabra a resaltar
        $color             = get_field('color_texto_resaltado');
        $estilo             = get_field('estilo');

        // Manejo seguro del campo imagen
        $imagen_url = '';
        if (is_array($imagen_fondo) && isset($imagen_fondo['url'])) {
            $imagen_url = esc_url($imagen_fondo['url']);
        } elseif (is_string($imagen_fondo)) {
            $imagen_url = esc_url($imagen_fondo);
        }

        // Reemplazamos solo la primera coincidencia de la palabra dentro del título
        if ($palabra_resaltada && $color) {
            $titulo = preg_replace(
                '/(' . preg_quote($palabra_resaltada, '/') . ')/i',
                '<span style="color:' . esc_attr($color) . ';">$1</span>',
                $titulo,
                1 // solo la primera coincidencia
            );
        }
        ?>

        <div class="banner" style="background-image:url('<?php echo $imagen_url; ?>');">
            <div class="container">
                <div class="circle" data-aos="fade-right" style="background-color:<?=$estilo ? "#FFF":"#000"?>;">
                    <h2 style="color:<?=$estilo ? "#000":"#FFF"?>;"><?php echo $titulo; // contiene el <span> ?></h2>
                </div>
            </div>
        </div>

    <?php
    endwhile;
    wp_reset_postdata();
endif;
?>
