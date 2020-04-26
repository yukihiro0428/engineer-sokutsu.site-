<?php get_header(); ?>
<!-- トップ画像、共通class --> 
  <section class="profileimg">
	  <p class="profile__img"><img src="<?php echo get_template_directory_uri(); ?>/img/titlebg-min.png" alt="プロフィール画像"></p>
	  <p class="profile__title"><img src="<?php echo get_template_directory_uri(); ?>/img/top_titlelogo2-min.png" alt="タイトル"></p>
  </section>


  <!-- section,共通class =>profile.scss-->
  <!-- アイキャッチ画像の出力 -->
  <?php
	$title_bg = "style=''";
	if ( has_post_thumbnail() ) {
		$img_url  = wp_get_attachment_url( get_post_thumbnail_id() );
		$title_bg = "style='background-image:url(" . $img_url . ");'";
	}
	?>
  <section class="sec05" id="scroll-js">
	<div class="sec05__about--st"  <?php echo $title_bg; ?>>
	  <h2 class="sec05__about__title--st"><?php the_field( 'subtitle' ); ?></h2>
	  <div class="sec05__about__right">
		<div class="text--st"> 
		  <h2 class="text--st__h2"><?php the_field( 'h2' ); ?></h2>
		  <p class="text--st__p"><?php the_field( 'content' ); ?></p>
		</div>  
	  </div>
	</div>
  </section>
  
  <?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
  <section class="sec06">
			<?php
			// 本文の表示
			the_content();
			?>

  </section>
			<?php
	endwhile;
  endif;
	?>

<?php get_template_part( 'template/contactform' ); ?>

<?php get_footer(); ?>
