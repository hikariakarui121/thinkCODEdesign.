<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/reset.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/img/favicon.ico">
  <title><?php bloginfo('name'); ?></title>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="SiteWrapper">
    <header id="header" class="header -open">
      <div class="header__inner h-inner">
        <h1 class="header__logo"><a href=" <?php echo esc_url(home_url()); ?>">Think CODE Design.</a></h1>
        <nav class="header__globalNav" id="globalNav">
          <ul class="header__items">
            <li class="header__item delay-time02"><a href="#message">Message</a></li>
            <li class="header__item delay-time03"><a href="#service">Service</a></li>
            <li class="header__item delay-time04"><a href="#works">Works</a></li>
            <li class="header__item delay-time05"><a href="#blog">Blog</a></li>
            <li class="header__item delay-time06"><a class="blue-font" href="#contact">Contact</a></li>
          </ul>
        </nav>
      </div>
      <a class="header__menuButton" id="menuButton">
        <div></div>
        <div></div>
        <div></div>
      </a>
    </header>
    <main>