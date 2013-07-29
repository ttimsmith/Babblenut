<!DOCTYPE html>
<html lang="en">

<head>

  <!-- 

  @@@@@@@@@@@@@@@@@  @@@   @@@          @@@ 
  @@@@@@@@@@@@@@@@@  @@@   @@@@        @@@@
         @@@         @@@   @@@ @      @ @@@
         @@@         @@@   @@@  @@  @@  @@@
         @@@         @@@   @@@   @@@    @@@
         @@@         @@@   @@@          @@@
         @@@         @@@   @@@          @@@
         @@@         @@@   @@@          @@@

  How much does a polar bear weigh? Just enough to break the ice.

  Made with love in beautiful Saint Paul, Minnesota.

  © 2013 Paul Armstrong and Timothy B. Smith.

  -->

  <meta charset="utf-8" />
  <title><?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  
  <!-- My styles -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/global.css"/>

  <!-- Typekit Code -->
  <script type="text/javascript" src="//use.typekit.net/lym5isq.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>


  <!--WP Generated Header -->
  <?php wp_head(); ?>
  <!--End WP Generated Header -->
  
</head>
<body <?php body_class($class); ?>>

<div class="contain">

  <?php if (get_field('live_show', 'options')) : ?>
    <div class="live-banner">
        <div class="recording animated pulse"></div>
        <p>ON AIR: Babblenut #<?php the_field('live_episode_number', 'options'); ?> with Paul Armstrong &amp; Tim Smith - <a href="/live">Listen</a></p>
    </div>

  <?php endif; ?>

  <header class="site__header" role="banner">
    <nav class="site__nav" role="navigation">
      <ul>
        <li><a href="/">Episodes</a></li>
        <li><a href="/sponsorship">Sponsorship</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </nav>
  </header><!-- .site__header -->