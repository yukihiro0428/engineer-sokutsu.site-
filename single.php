<?php get_header(); ?>
<!-- トップ画像、共通class --> 
  <section class="profileimg">
      <p class="profile__img"><img src="<?php echo get_template_directory_uri() ?>/img/titlebg-min.png" alt="プロフィール画像"></p>
      <p class="profile__title"><img src="<?php echo get_template_directory_uri() ?>/img/top_titlelogo2-min.png" alt="タイトル"></p>
  </section>

  <article class="contact" id="scroll-js">
       <h2 class="contact__h1"><?php the_title(); ?></h2>
  </article>
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) :
      the_post();
      ?>
  <section class="sec06">
  <?php
  //本文の表示
  the_content(); 
  ?>

  </section>
  <?php
  endwhile;
  endif;
  ?>

<?php get_template_part('template/contactform'); ?>

<?php get_footer(); ?>