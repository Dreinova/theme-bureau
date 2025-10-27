<?php
/*
Template Name: Página de Alianzas
*/
get_header(); ?>
<div
  class="page-content <?php echo 'page-' . get_post_field('post_name', get_post()); ?>"
>
  <?php  get_template_part( 'template-parts/section', 'banner' ); ?>
  <div class="beneficiosalianzas">
    <div class="container">
      <h2>Beneficios <strong>del destino</strong></h2>
      <p>
        El Bureau de Convenciones ofrece un valor estratégico para tu evento.
        Nuestros beneficios no tributarios están diseñados para maximizar la
        relevancia de su evento, asegurar su cumplimiento con estándares de
        sostenibilidad y garantizar un impacto positivo y medible en el destino.
        Convierte tu reunión en una contribución activa al futuro de Bogotá.
      </p>
      <ul>
        <li>
          <img src="https://nuevo.bogotabureau.org/wp-content/uploads/2025/10/graf.avif" alt="Icono" width="80" height="80" style="display:block;margin:0 auto 30px; object-fit:contain;">
          <strong>Medición de Impacto:</strong> cuantificamos el impacto
          económico y en el conocimiento de tu reunión. Obtén datos precisos
          para justificar tu inversión ante stakeholders.
        </li>
        <li>
          <img src="https://nuevo.bogotabureau.org/wp-content/uploads/2025/10/ruta.avif" alt="Icono" width="80" height="80" style="display:block;margin:0 auto 30px; object-fit:contain;">
          <strong>Hoja de ruta en sostenibilidad:</strong> recibe asesoría
          experta para implementar prácticas sostenibles y medir/compensar la
          huella de tu evento, reforzando su liderazgo verde.
        </li>
        <li>
          <img src="https://nuevo.bogotabureau.org/wp-content/uploads/2025/10/star-1.avif" alt="Icono" width="80" height="80" style="display:block;margin:0 auto 30px; object-fit:contain;">
          <strong>Acciones de legado:</strong> conectamos tu evento con
          proyectos locales para generar un impacto social y de conocimiento
          duradero en la comunidad anfitriona.
        </li>
      </ul>
    </div>
  </div>
  <div class="red">
    <div class="container">
      <h2>
        Alianzas estratégicas
        <strong> Red de soporte y oportunidades </strong>
      </h2>
      <p>
        Con nuestra red de alianzas estratégicas (públicas y privadas)
        garantizamos un ecosistema de soporte integral para tu evento. Puedes
        acceder a beneficios preferenciales, networking de alto nivel e
        inteligencia de destino, asegurando que tu reunión cuente con las
        mejores condiciones y el respaldo total de la ciudad.
      </p>
      <a href="/haz-tu-evento-en-bogota/" class="btn"
        >Haz tu evento en Bogotá</a
      >
    </div>
  </div>
  <div class="acciones">
    <div class="container">
      <h2>
        Acciones de legado
        <strong> Impacto que trasciende </strong>
      </h2>
      <p>
        Cada evento en Bogotá es una oportunidad para la transformación social.
        Descubre cómo convertimos su reunión en un agente de cambio positivo.
      </p>
      <a href="/haz-tu-evento-en-bogota/" class="btn"
        >Haz tu evento en Bogotá</a
      >
    </div>
  </div>
</div>

<?php get_footer(); ?>
