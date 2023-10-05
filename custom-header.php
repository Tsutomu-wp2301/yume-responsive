<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://kit.fontawesome.com/ea77b87548.js" crossorigin="anonymous"></script>
  <meta name="vewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<header class = "p-header">
  <div class = "p-header-color p-header-height p-header-flex--sp">
    <div class="p-header-flex">
      <h1 class = "p-header-flex__img ">
        <a href="<?php echo esc_url(home_url('/schedule'));?>">
          <P>YUME LAND</p>
        </a>
        <img src="<?php echo get_template_directory_uri(); ?>/image/h2logo.png" alt="夢らんどグループ" width="100%">
      </h1>
      <a href="https://www.facebook.com/taiheiyumeland">
        <i class="fa-brands fa-facebook"></i>
      </a>
    </div> 
  </div>
</header>
<body class="l-body" <?php body_class(); ?>>
<?php wp_body_open(); ?>
