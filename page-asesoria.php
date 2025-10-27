<?php
/*
Template Name: Página de Asesoría
*/
get_header(); ?>
<div
  class="page-content <?php echo 'page-' . get_post_field('post_name', get_post()); ?>"
>
<?php get_template_part( 'template-parts/section', 'banner' ); ?>

<?php if (isset($_GET['enviado'])): ?>
    <p class="confirmacion">✅ Gracias, tu mensaje ha sido enviado correctamente.</p>
    <?php else : ?>
      <h3>Obtén asesoría de expertos</h3>
<form method="post" action="">
  <label for="empresa">Empresa *</label>
  <input type="text" name="empresa" id="empresa" required placeholder="Ingresa el nombre de la empresa">

  <label for="telefono">Teléfono / Celular *</label>
  <input type="text" name="telefono" id="telefono" required placeholder="Ingresa un número telefónico o celular">

  <label for="email">Email *</label>
  <input type="email" name="email" id="email" required placeholder="Ingresa un e-mail válido">

  <label for="ciudad">Ciudad</label>
  <input type="text" name="ciudad" id="ciudad" placeholder="Ingresa la ciudad">

  <label for="fecha">Fecha estimada del evento</label>
  <input type="date" name="fecha" id="fecha">

  <label for="personas">Personal de registro</label>
  <input type="number" name="personas" id="personas" placeholder="Selecciona la cantidad de personas">

  <label for="servicios">Servicios a cotizar</label>
  <textarea name="servicios" id="servicios"></textarea>

  <label>
    <input type="checkbox" name="autorizacion" required>
    Autorizo el tratamiento de datos
  </label>

  <p class="nota-legal">
    Al enviar este formulario, autorizas a Bogota Convention Bureau a contactarte para propósitos relacionados con los servicios que requieras. 
    Consulta nuestra <a href="https://es.investinbogota.org/aviso-legal/" target="_blank">política de tratamiento de datos personales</a>.
  </p>

  <button type="submit" name="enviar_formulario" class="btn-primary">Enviar</button>
</form>
<?php endif; ?>

</div>

<?php get_footer(); ?>
