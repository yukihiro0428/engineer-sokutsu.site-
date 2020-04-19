<?php get_header(); ?>
    <div class="topimg">
        <p class="top__img"><img src="<?php echo get_template_directory_uri() ?>/img/top_titlebg-min.png" alt="トップ画像"></p>
        <h1 class="top__title"><img src="<?php echo get_template_directory_uri() ?>/img/top_titlelogo-min.png" alt="タイトル"></h1>
    </div>
    <section class="sec01" id="scroll-js">
      <div class="sec01__holding">
        <h2 class="sec01__holding__h1">開催予定のイベント</h2>
        <ul class="sec01__holding__post">
          <!-- 予定イベントのループ処理-->

          <?php
          $news_query = new WP_Query(
            array(
              'post_type'      => 'scheduled_events',
              'posts_per_page' => 3,
              'meta_key' => 'eventdate',
            )
          );
          ?>
          <?php if ( $news_query->have_posts() ) : ?>
            <?php while ( $news_query->have_posts() ) : ?>
              <?php $news_query->the_post(); ?>
           
          <li class="sec01__holding__post__li">
            <table>
              <tr class="tr-first">
                <!-- 表：大阪部分 -->                
                <?php
                if ($terms = get_the_terms($post->ID, 'events_plans')) {
                    foreach ( $terms as $term ) {
                        echo ('<th class="tr-first__left--') ;
                        echo $term->slug ;
                        echo ('">') ;
                        }
                    }
                ?>
                <?php the_field( 'place' ); ?>
                </th>

                <!-- 表：右側タイトル -->
                <?php
                if ($terms = get_the_terms($post->ID, 'events_plans')) {
                    foreach ( $terms as $term ) {
                        echo ('<th class="tr-first__right--') ;
                        echo $term->slug ;
                        echo ('">') ;
                        echo $term->name;
                      }
                    }
                ?>
                </th>
                
                
              </tr>
              <tr class="tr-second">
                <!-- 2段目日付部分 -->
                <td class="tr-second__left">
                  <?php $date = date_create(get_field('eventdate')); echo date_format($date, 'm'); ?>月<br>
                  <span><?php $date = date_create(get_field('eventdate')); echo date_format($date, 'd'); ?>日</span><br>
                  <?php 
                    // get raw date
                    $date_day = get_field('eventdate');
                    // make date object
                    $date_day = new DateTime($date_day);
                    // week
                    $week = array("日", "月", "火", "水", "木", "金", "土");
                  ?>
                  <?php echo $week[(int)date_format($date_day,'w')] ?>曜日
                </td>
                <!-- 2段目タイトル -->
                <?php
                if ($terms = get_the_terms($post->ID, 'events_plans')) {
                    foreach ( $terms as $term ) {
                        echo ('<td class="tr-second__right--') ;
                        echo $term->slug ;
                        echo ('">') ;
                      }
                    }
                ?>
                <?php the_title()?>
                </td>
              </tr>
              <tr class="tr-third">
                <td class="tr-third__left">
                  <ul>
                    <li><span class="span">定</span>員：</li>
                    <li>登壇者：</li>
                    <li>対象者：</li>
                  </ul>
                </td>
                <td class="tr-third__right">
                  <ul>
                    <li><?php the_field( 'capacity' ); ?>名</li>
                    <li><?php the_field( 'speakers' ); ?></li>
                    <li class="text"><?php the_field( 'target_person' ); ?></li>
                  </ul>
                </td>
              </tr>
              <tr class="tr-fourth"><td colspan="2"><a href="<?php the_field( 'join' ); ?>">このイベントに参加する</a></td></tr>
            </table>
          </li>
          <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?> 
        </ul>
      </div>

      <div class="sec01__past">
        <h2 class="sec01__past__h1">過去のイベントレポート</h2>
        <!-- 今日までの日付に絞るループ処理-->
        <ul class="sec01__past__post">
        <!-- 予定イベントのループ処理-->
        <?php
          $news_query = new WP_Query(
            array(
              'post_type'      => 'past_event',
              'posts_per_page' => 3,
              'meta_key' => 'eventdate',
              'orderby'  => 'meta_value',
              'order' => 'DESC',
            )
          );
          ?>
          <?php if ( $news_query->have_posts() ) : ?>
            <?php while ( $news_query->have_posts() ) : ?>
              <?php $news_query->the_post(); ?>

          <li class="sec01__past__post__li">
            <div class="caption">
              <p class="caption__img">
              <?php
              if (has_post_thumbnail() ) {
              // アイキャッチ画像が設定されてれば大サイズで表示
              the_post_thumbnail('large');
              } else {
              // なければnoimage画像をデフォルトで表示
              echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/ogp-image.png" alt="noimge">';
              }
              ?>
              </p>
              <div class="caption__img__end">
                <!-- ページ外アンカーリンク設定 -->
                <?php 
                if ($terms = get_the_terms($post->ID, 'events')) {
                  foreach ( $terms as $term ) {
                    echo (' <a href=" ');
                    echo home_url('/events');
                    echo ('/');
                    echo  $term->slug ;
                    echo ('/#');
                    echo the_ID();
                    echo ('">');
                    }
                  }
                ?>
                <i class="fas fa-arrow-right"></i>
                <p>more</p>
                </a>
              </div>
            </div>
            <div class="caption__right">
              <h2><!-- アプリ勉強会orゲスト講演 -->
              <?php
                if ($terms = get_the_terms($post->ID, 'events')) {
                    foreach ( $terms as $term ) {
                        echo ('<span class="') ;
                        echo $term->slug ;
                        echo ('">');
                        echo $term->name;
                        echo ('</span>') ;
                      }
                    }
                ?>
                <?php $date = date_create(get_field('eventdate')); echo date_format($date, 'Y'); ?>年<?php $date = date_create(get_field('eventdate')); echo date_format($date, 'm'); ?>月<?php $date = date_create(get_field('eventdate')); echo date_format($date, 'd'); ?>日
                <?php 
                // get raw date
                $date_day = get_field('eventdate');
                // make date object
                $date_day = new DateTime($date_day);
                // week
                $week = array("日", "月", "火", "水", "木", "金", "土");
                ?>
                <?php echo $week[(int)date_format($date_day,'w')] ?>曜日
              </h2>
              <h3><?php the_title()?></h3>
              <table>
                <tr><td class="td__left--app"><span>場</span>所：</td><td><?php the_field( 'place' ); ?></td></tr>
                <tr><td class="td__left--app">登壇者：</td><td><?php the_field( 'speakers' ); ?></td></tr>
                <tr><td class="td__left--app">対象者：</td><td class="td__right"><?php the_field( 'target_person' ); ?></td></tr>
              </table>
            </div>
          </li>
          <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?> 
        </ul>
      </div>
    </section>
                    
    <section class="sec02">
      <div class="profile">
        <h2>PROFILE</h2>
        <div class="profile__about">
          <p class="profile__about__img"><img src="<?php echo get_template_directory_uri() ?>/img/プロフィールアイコン-min.png" alt="イラスト顔写真"></p>
          <div class="profile__about__text">
            <h2>
              <?php echo get_post_meta(79, 'h2', true); ?>
            </h2>
            <p>
              <?php echo get_post_meta(79, 'content', true); ?>
            </p>
          </div>
        </div>
        <a class="profile__about__bt" href="<?php echo home_url('/profile'); ?>">詳しく見る</a>
        <h3><?php the_field( 'profile_titlebottom' ); ?></h3>
        <p class="profile__foot"><?php the_field( 'profile_textbottom' ); ?></p>
      </div>
    </section>

    <section class="sec03">
      <ul>
        <li class="sec03__li">
          <p class="sec03__hero--app"><img src="<?php echo get_template_directory_uri() ?>/img/アプリ_背景01.png" alt="アプリ用の背景"></p>
          <p class="sec03__rsp--app"><img src="<?php echo get_template_directory_uri() ?>/img/app_bg_sp.png" alt="アプリ用の背景"></p>
          <div class="sec03__top">
            <p class="sec03__top__title--app"><img src="<?php echo get_template_directory_uri() ?>/img/01-min.png" alt="01"></p>
              <h2 class="sec03__top__h2--app">App Development</h2>
              <p class="sec03__top__img--app">
              <?php
              $image = get_field('image_app');
              $src = $image['url'];
              $width = $image['width'];
              $height = $image['height'];
            ?>
            <img src="<?php echo $src; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="アプリ用写真">
            </p>
          </div>
          <div class="sec03__text"> 
            <h2 class="sec03__text__head-h2"><?php the_field( 'title_app' ); ?></h2>
            <p class="sec03__text__head-p"><?php the_field( 'text_app' ); ?></p>
            <h2 class="sec03__text__foot-h2">こんな方におすすめ</h2>
            <ul class="sec03__text__foot-ul">
              <li class="sec03__text__foot-ul__li"><p class="app"><?php the_field( 'app_text1' ); ?></p></li>
              <li class="sec03__text__foot-ul__li"><p class="app"><?php the_field( 'app_text2' ); ?></p></li>
              <li class="sec03__text__foot-ul__li"><p class="app"><?php the_field( 'app_text3' ); ?></p></li>
            </ul>
            <a class="sec03__text__more--app" href="<?php echo home_url('/events/app'); ?>">詳しく見る</a>
          </div>
        </li>
        <li class="sec03__li">
          <p class="sec03__hero--guest"><img src="<?php echo get_template_directory_uri() ?>/img/ゲスト_背景02.png" alt="ゲスト用の背景"></p>
          <p class="sec03__rsp--guest"><img src="<?php echo get_template_directory_uri() ?>/img/guest_bg_sp.png" alt="ゲスト用の背景"></p>
          <div class="sec03__top">
            <p class="sec03__top__title--guest"><img src="<?php echo get_template_directory_uri() ?>/img/02-min.png" alt="01"></p>
            <h2 class="sec03__top__h2--guest">Special seminar</h2>
            <p class="sec03__top__img--guest">
            <?php
            $image = get_field('image_guest');
            $src = $image['url'];
            $width = $image['width'];
            $height = $image['height'];
            ?>
            <img src="<?php echo $src; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="ゲスト用写真">
            </p>
          </div>
          <div class="sec03__text"> 
            <h2 class="sec03__text__head-h2"><?php the_field( 'title_guest' ); ?></h2>
            <p class="sec03__text__head-p"><?php the_field( 'text_guest' ); ?></p>
            <h2 class="sec03__text__foot-h2">こんな方におすすめ</h2>
            <ul class="sec03__text__foot-ul">
              <li class="sec03__text__foot-ul__li"><p class="guest"><?php the_field( 'guest_text1' ); ?></p></li>
              <li class="sec03__text__foot-ul__li"><p class="guest"><?php the_field( 'guest_text2' ); ?></p></li>
              <li class="sec03__text__foot-ul__li"><p class="guest"><?php the_field( 'guest_text3' ); ?></p></li>
            </ul>
            <a class="sec03__text__more--guest" href="<?php echo home_url('/events/guest'); ?>">詳しく見る</a>
          </div>
        </li>
      </ul>
    </section>
  
    <section class="sec04">
      <h2>MESSAGE</h2>
      <p><?php the_field( 'message_text' ); ?></p>
    </section>
    
    <?php get_footer(); ?>