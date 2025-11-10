
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KVFFMM4P');</script>
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVFFMM4P"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->"
    <header class="site-header">
  <div class="header-container">
    <div class="site-branding">
      <?php
      if (has_custom_logo()) {
          the_custom_logo();
      } else {
          echo '<a href="' . esc_url(home_url('/')) . '" class="site-title">' . get_bloginfo('name') . '</a>';
      }
      ?>
    </div>
   <nav class="main-navigation">
  <button class="menu-toggle" aria-label="Abrir menú">
    <span class="hamburger"></span>
  </button>

  <?php
  wp_nav_menu(
    array(
      'menu' => 'primary',
      'container' => '',
      'theme_location' => 'primary',
      'items_wrap' => '<ul class="menu">%3$s</ul>'
    )
  );
  ?>
</nav>

  </div>
</header>