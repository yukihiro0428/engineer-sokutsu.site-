<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, ,minimum-scale=1.0">
  <title>エンジニアの巣窟</title>
  <?php wp_head(); ?>
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700,900&display=swap" rel="stylesheet">
</head>
<body>
<header>
      <nav>
        <p id="logo_js"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/header_logo-min.png" alt="ヘッダーロゴ"></a></p>
        <div class="menu-trigger">
          <span class="menu-trigger-span"></span>
          <span class="menu-trigger-span"></span>
          <span class="menu-trigger-span"></span>
        </div>
        <div class="header__list">
        <?php
        wp_nav_menu(
          //.header-listを置き換えて、PC用メニューを動的に表示する
          array(
            'depth' => 1,
            'theme_location' => 'global', //グローバルメニューをここに表示すると指定
            'container' => 'false',
            'menu_class' => 'header__list__ul',
            'menu_id' => 'nav_js',
          )
        );
        ?>
         
        </div>
        <div class="header__icon">
          <div class="header__icon__twitter" id="twitter_js"><a href="https://twitter.com/freepc_yuki?ref_src=twsrc%5Etfw"><i class="fab fa-twitter fa-lg"></i></a></div>
          <div class="header__icon__connpass"><a href="https://connpass.com/user/freepc_yuki/"><img src="<?php echo get_template_directory_uri() ?>/img/connpass-min.png" alt="connpass"></a></div>
        </div>
        <div class="overlay"></div><!-- sp時の横からのスライド表示 -->
      </nav>
    </header>
    <!-- トップ画像 -->