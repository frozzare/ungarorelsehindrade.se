<header class="header" role="banner">
  <div class="header__inner container">
    <h1 class="site-title">
      <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>
    </h1>
    <nav class="main-nav" role="navigation">
      <?php
        if (has_nav_menu('primary')) :
          wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav nav--banner'));
        endif;
      ?>
    </nav>
  </div>
</header>
