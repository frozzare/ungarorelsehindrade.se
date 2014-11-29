<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('Du använder en <strong>uråldrig</strong> webbläsare. Vänligen <a href="http://browsehappy.com/">uppdatera din webbläsare</a> för att förbättra din upplevelse.', 'ungarh'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

  <div class="wrap" role="document">
    <div class="content row">
      <main class="main" role="main">
        <?php include ungarh_template_path(); ?>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>

</body>
</html>
