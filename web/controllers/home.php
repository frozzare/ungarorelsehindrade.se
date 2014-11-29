<?php get_template_part('templates/jumbotron'); ?>

<?php get_template_part('templates/pier'); ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>
