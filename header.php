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
        <P>YUME LAND</p>
        <img src="<?php echo get_template_directory_uri(); ?>/image/h2logo.png" alt="夢らんどグループ" width="100%">
      </h1>
      <a href="https://www.facebook.com/taiheiyumeland">
        <i class="fa-brands fa-facebook"></i>
      </a>
      <button id="toggleButton" class = "p-header-button--sp">
        <div class="button-line"></div>
      </button>
    </div>
  </div>
  <!-- フロントページの背景 -->
  <?php if (is_front_page()) : ?>
    <div class="p-header--background"></div>

    <!-- アーカイブ、カテゴリー、タクソノミーページの背景 -->
    <?php elseif (is_archive() || is_category() || is_tax()) : ?>
      <div class="p-header--background--archive"></div>

    <!-- 投稿など、その他のページの背景 -->
    <?php else : ?>
      <div class="p-header--background--post"></div>
  <?php endif; ?>

  <section class = "p-global-nav--sp"><!-- SPハンバーガーボタン -->
    <ul>
      <li class = "p-global-nav__list--home">
        <a href="<?php echo esc_url(home_url()); ?>">
          <img class="c-nav-icon--home" src="<?php bloginfo('template_directory'); ?>/image/globalnav/icon-home.svg" alt="ホームに戻るアイコン"/>トップページへ戻る
        </a>
      </li>
      <li class = "p-global-nav__list">
        <a href="<?php echo esc_url(home_url('tenpointroduction')); ?>">
          <img class="c-nav-icon" src="<?php bloginfo('template_directory'); ?>/image/globalnav/icon-tenpo.svg" alt="店舗一覧アイコン"/>店舗一覧
        </a>
      </li>
      <li class = "p-global-nav__list">
        <a href="#">
          <img class="c-nav-icon" src="<?php bloginfo('template_directory'); ?>/image/globalnav/icon-media.svg" alt="メディアアイコン"/>メディア
        </a>
      </li>
      <li class = "p-global-nav__list">
        <a href="#">
          <img class="c-nav-icon" src="<?php bloginfo('template_directory'); ?>/image/globalnav/icon-recruit.svg" alt="採用情報アイコン"/>採用情報
        </a>
      </li>
      <li class = "p-global-nav__list">
        <a href="#">
          <img class="c-nav-icon" src="<?php bloginfo('template_directory'); ?>/image/globalnav/icon-conpany.svg" alt="企業情報アイコン"/>企業情報
        </a>
      </li>
      <li class = "p-global-nav__list">
        <a href="#">
          <img class="c-nav-icon" src="<?php bloginfo('template_directory'); ?>/image/globalnav/icon-QA.svg" alt="Q&Aアイコン"/>Q&A
        </a>
      </li>
      <li class = "p-global-nav__list">
        <a href="#">
          <img class="c-nav-icon" src="<?php bloginfo('template_directory'); ?>/image/globalnav/icon-facebook.svg" alt="フェイスブックアイコン"/>facebook
        </a>
      </li>
    </ul>
  </section>
  <section class = "p-global-nav">
    <?php 
      get_template_part( 'template-parts/header', 'menu2' ); 
    ?>
  </section>
</header>
<body class="l-body" <?php body_class(); ?>>
<?php wp_body_open(); ?>
