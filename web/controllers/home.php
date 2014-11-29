<?php get_template_part('templates/jumbotron'); ?>

<?php get_template_part('templates/pier'); ?>

<div class="news container">
  <h3 class="news-title"><?php _e( "Nyheter", "ungarh" ); ?></h3>

  <div class="news__inner">
    <?php
      $args = array('posts_per_page' => 3);
      $query = new WP_Query( $args );
      while( $query->have_posts()) : $query->the_post();
    ?>
      <?php get_template_part('templates/news', get_post_format()); ?>
    <?php endwhile; ?>
  </div>
  <!--/.news__inner -->
</div>
<!--/.news -->
