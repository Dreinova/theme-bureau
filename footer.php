<div class="masinfo">
  <div class="container">
    <span class="masinfo-title">Solicita</span>
    <span class="masinfo-subtitle">más información <a href="" class="btn">Haz tu evento en Bogotá</a></span>
  </div>
  <img src="/wp-content/uploads/2025/10/masinfo.avif" alt="Haz tu evento en Bogotá" class="masInfo">
</div>
<footer class="site-footer">
    <div class="logoFooter">
     <?php
      if (has_custom_logo()) {
          the_custom_logo();
      } else {
          echo '<a href="' . esc_url(home_url('/')) . '" class="site-title">' . get_bloginfo('name') . '</a>';
      }
      ?>
    </div>
  <div class="footer-container">
    <div class="footer-column">
      <h4>Menú</h4>
      <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_menu_1',
          'menu_class' => 'footer-menu',
          'container' => false
        ));
      ?>
    </div>

    <div class="footer-column">
      <h4>¿Por qué Bogotá?</h4>
      <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_menu_2',
          'menu_class' => 'footer-menu',
          'container' => false
        ));
      ?>
    </div>
    <div class="footer-column">
      <h4>Haz tu evento en Bogotá</h4>
      <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_menu_3',
          'menu_class' => 'footer-menu',
          'container' => false
        ));
      ?>
    </div>

    <div class="footer-column footer-contact">
      <h4>Contacto</h4>
     <ul>
  <li>
    📞 
    <a href="tel:+573177806158" aria-label="Llamar al número (+57) 317 780 6158">
      (+57) 317 780 6158
    </a>
  </li>
  <li>
    📍 Calle 67 # 8 – 32/44, Piso 4. Bogotá, Colombia.
  </li>
  <li>
    ✉️ 
    <a href="mailto:bureau.bogota@investinbogota.org" aria-label="Enviar un correo a bureau.bogota@investinbogota.org">
      bureau.bogota@investinbogota.org
    </a>
  </li>
</ul>

<div class="footer-social">
  <a href="https://www.instagram.com/tu_perfil" aria-label="Visitar el perfil de Instagram">
    <i class="fab fa-instagram" aria-hidden="true"></i>
  </a>
  <a href="https://www.linkedin.com/company/tu_empresa" aria-label="Visitar la página de LinkedIn">
    <i class="fab fa-linkedin" aria-hidden="true"></i>
  </a>
</div>

    </div>
  </div>
</footer>

</body>

</html>