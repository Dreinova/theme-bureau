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

        $imagen_fondo = get_field('imagen');
        $titulo = get_field('texto_resaltado');
        $subtitulo = get_field('texto_banner');
        $color = get_field('color_texto_resaltado');

        // Manejo seguro del campo imagen
        $imagen_url = '';
        if (is_array($imagen_fondo) && isset($imagen_fondo['url'])) {
            $imagen_url = esc_url($imagen_fondo['url']);
        } elseif (is_string($imagen_fondo)) {
            $imagen_url = esc_url($imagen_fondo);
        }

        ?>
        <div class="banner" style="background-image:url('<?php echo $imagen_url; ?>');">
            <div class="container">
                <div class="circle">
                    <h2 style="color:<?=$color?>;"><?php echo esc_html($titulo); ?></h2>
                    <h3><?php echo esc_html($subtitulo); ?></h3>
                </div>
            </div>
        </div>
        <?php

    endwhile;
    wp_reset_postdata();
endif;
?>