<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE]>           <html class="no-js ie-shit"> <![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />

  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700|Enriqueta:400,700' rel='stylesheet' type='text/css'>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

  <meta charset="utf-8">
  <?php wp_head(); ?>
</head>
