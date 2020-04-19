<!-- http://yuukisite.local/events/guest/ -->

<?php get_header(); ?>

<!-- トップ画像、共通class --> 
<section class="profileimg">
    <p class="profile__img"><img src="<?php echo get_template_directory_uri() ?>/img/app_bg-min.png" alt="背景画像"></p>
    <p class="profile__title"><img src="<?php echo get_template_directory_uri() ?>/img/app_titlelogo-min.png" alt="タイトル"></p>
</section>

     <!-- section,共通class =>profile.scss-->
    <section class="sec05" id="scroll-js">
      <!-- カスタムフィールドのapp画像の出力 -->
      <?php
      $title_bg = "style=''";
      $img_url = wp_get_attachment_url( get_post_meta(165, 'image_app', true) );
      $title_bg = "style='background-image:url(".$img_url.");'";
      ?>
      <div class="sec05__about--app" <?php echo $title_bg; ?>><!-- 条件別class有り-->
        <h2 class="sec05__about__title--app">App Development</h2>  
        <div class="sec05__about__right">
          <div class="text--app"><!-- 条件別class有り-->
            <h2 class="text--app__h2"><?php echo get_post_meta(165, 'title_app', true); ?></h2>
            <p class="text--app__p"><?php echo get_post_meta(165, 'text_app', true); ?></p>
          </div>  
        </div>
      </div>
    </section>

    <section class="sec07">
      <ul class="sec07__ul">

        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
              
                <?php 
                if ($terms = get_the_terms($post->ID, 'events')) {
                  foreach ( $terms as $term ) {
                    echo ('<li class="sec07__ul__li anchor" id="');
                    echo the_ID();
                    echo ('">');
                    }
                  }
                ?>
                <p class="time">
                <?php $date = date_create(get_field('eventdate')); echo date_format($date, 'Y'); ?>年<?php $date = date_create(get_field('eventdate')); echo date_format($date, 'm'); ?>月<?php $date = date_create(get_field('eventdate')); echo date_format($date, 'd'); ?>日<?php 
                // get raw date
                $date_day = get_field('eventdate');
                // make date object
                $date_day = new DateTime($date_day);
                // week
                $week = array("日", "月", "火", "水", "木", "金", "土");
                ?><?php echo $week[(int)date_format($date_day,'w')] ?>曜日
                </p>
                <h2 class="title"><?php the_title()?></h2>
                <p class="img">
                <?php
                if (has_post_thumbnail() ) {
                // アイキャッチ画像が設定されてれば大サイズで表示
                the_post_thumbnail('large');
                } else {
                // なければnoimage画像をデフォルトで表示
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/ogp-image.png" alt="アプリでの写真">';
                }
                ?>  
                </p>
                <div class="about">
                  <div class="about__in--app"><!-- appの場合 -->
                    <h2 class="category--app">アプリ勉強会</h2><!-- appの場合 -->
                    <table>
                      <?php if(get_field( 'place' )): ?><tr><td>場<span>所：</span></td><td><?php the_field( 'place' ); ?></td></tr><?php endif; ?>
                      <?php if(get_field( 'speakers' )): ?><tr><td>登壇者：</td><td><?php the_field( 'speakers' ); ?></td></tr><?php endif; ?>
                      <?php if(get_field( 'target_person' )): ?><tr><td>対象者：</td><td><?php the_field( 'target_person' ); ?></td></tr><?php endif; ?>
                    </table>
                    
                    <p class="text"><?php the_field( 'text' ); ?></p>
                    <?php if( get_field('movie_url') ): ?>
                      <div class="iframe-wrap">
                          <iframe width="740" height="420" 
                          <?php echo $embed_code = wp_oembed_get( get_field('movie_url') ); ?>
                          frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                          </iframe>
                        <!-- www.youtube.com/embed/WlABdHgfLNU -->
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </li>
        
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </section>



    
    <?php if (paginate_links() ) : ?>
    <!-- pagenation -->
    <div class="pagenation">
    <?php
    echo
    paginate_links(
    array(
      'end_size' => 0,
      'mid_size' => 1,
      'prev_next' => true,
      'prev_text' => '<i class="fas fa-arrow-left"></i>PREV',
      'next_text' => 'NEXT<i class="fas fa-arrow-right"></i>',
      )
    );
    ?>
    </div><!-- /pagenation -->
    <?php endif; ?>
    
    

    <?php get_template_part('template/contactform'); ?>


<?php get_footer(); ?>