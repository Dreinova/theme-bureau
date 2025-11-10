<?php
// Query inicial (todas las noticias)
$args = array(
    'post_type' => 'noticias-bureau',
    'posts_per_page' => -1,
    'order' => 'DESC',
);

$noticias = new WP_Query($args);

// Obtener categorías disponibles
$todas_categorias = get_terms(array(
    'taxonomy' => 'categoria-noticia',
    'hide_empty' => true,
));
?>

<section class="noticias">
    <div class="buscador-noticias">
        <form id="form-busqueda-noticias">
            <input
                type="text"
                id="buscar"
                placeholder="Buscar noticias..."
                name="s"
            />

            <div class="filtros-fecha">
                <label>Desde</label>
                <input type="date" id="fecha-desde" name="fecha_desde">
                <label>Hasta</label>
                <input type="date" id="fecha-hasta" name="fecha_hasta">
            </div>

            <div class="filtros-categorias">
                <button type="button" class="active" data-categoria="all">Todas</button>
                <?php foreach ($todas_categorias as $cat) : ?>
                    <button type="button" data-categoria="<?= esc_attr($cat->slug) ?>">
                        <?= esc_html($cat->name) ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </form>
    </div>

    <div class="listado-noticias">
        <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>
            <?php
            $img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            $categorias = get_the_terms(get_the_ID(), 'categoria-noticia');
            $fecha = get_the_date('Y-m-d');
            $slugs = [];

            if (!empty($categorias) && !is_wp_error($categorias)) {
                foreach ($categorias as $cat) {
                    $slugs[] = $cat->slug;
                }
            }
            $data_categorias = implode(' ', $slugs);
            ?>
            
            <a href="<?php the_permalink(); ?>">
                <article
                    class="noticia"
                    data-categorias="<?= esc_attr($data_categorias) ?>"
                    data-fecha="<?= esc_attr($fecha) ?>"
                >
                    <?php if ($img): ?>
                        <img loading="lazy" src="<?= esc_url($img) ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="texto">
                        <?php if (!empty($categorias)) : ?>
                            <div class="categoria">
                                <?php foreach ($categorias as $cat) : ?>
                                    <span><?= esc_html($cat->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                    </div>
                </article>
            </a>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".filtros-categorias button");
    const noticias = document.querySelectorAll(".listado-noticias .noticia");
    const inputBuscar = document.getElementById("buscar");
    const inputDesde = document.getElementById("fecha-desde");
    const inputHasta = document.getElementById("fecha-hasta");

    let filtroCategoria = "all";

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            buttons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            filtroCategoria = btn.dataset.categoria;
            filtrarNoticias();
        });
    });

    [inputBuscar, inputDesde, inputHasta].forEach(el => {
        el.addEventListener("input", filtrarNoticias);
    });

    function filtrarNoticias() {
        const texto = inputBuscar.value.toLowerCase().trim();
        const desde = inputDesde.value ? new Date(inputDesde.value) : null;
        const hasta = inputHasta.value ? new Date(inputHasta.value) : null;

        noticias.forEach(noticia => {
            const titulo = noticia.querySelector("h3").textContent.toLowerCase();
            const descripcion = noticia.querySelector("p")?.textContent.toLowerCase() || "";
            const categorias = noticia.dataset.categorias.split(" ");
            const fecha = new Date(noticia.dataset.fecha);

            let visible = true;

            // Filtro por texto
            if (texto && !titulo.includes(texto) && !descripcion.includes(texto)) {
                visible = false;
            }

            // Filtro por categoría
            if (filtroCategoria !== "all" && !categorias.includes(filtroCategoria)) {
                visible = false;
            }

            // Filtro por fecha
            if (desde && fecha < desde) visible = false;
            if (hasta && fecha > hasta) visible = false;

            noticia.parentElement.style.display = visible ? "block" : "none";
        });
    }
});
</script>
