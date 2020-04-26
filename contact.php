<?php get_header(); ?>
<!-- トップ画像、共通class --> 
  <section class="profileimg">
	  <p class="profile__img"><img src="<?php echo get_template_directory_uri(); ?>/img/titlebg-min.png" alt="プロフィール画像"></p>
	  <p class="profile__title"><img src="<?php echo get_template_directory_uri(); ?>/img/top_titlelogo2-min.png" alt="タイトル"></p>
  </section>


  <?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
	<article class="contact" id="scroll-js">
	   <h2 class="contact__h1">CONTACT</h2>
	   <p class="contact__p"><?php echo get_post_meta( 94, 'contct_about', true ); ?></p>
			<?php
			// 本文の表示
			the_content();
			?>
	</article>
			<?php
		  endwhile;
		endif;
	?>

<?php get_footer(); ?>
<?php
/*
 * Template Name: 問い合わせページ
 */
