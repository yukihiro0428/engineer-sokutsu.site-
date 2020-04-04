<footer>
      <p class="polygon"><img src="<?php echo get_template_directory_uri() ?>/img/footer_ポリゴン-min.png" alt="footer-ポリゴン"></p>  
      <div class="footer">
        <h2 class="footer__title">CONTENTS</h2>
        <ul class="footer__ul">
          <li class="footer__ul__li">
            <div class="footer-rsp left">
              <p class="footer__ul__li__icon"><img src="<?php echo get_template_directory_uri() ?>/img/グループ 23-min.png" alt="アイコン"></p>
              <h2 class="footer__ul__li__title">企業の方へ</h2>
            </div>
            <div class="footer-rsp">
              <p class="footer__ul__li__text"><?php echo get_post_meta(165, 'for-company_text', true); ?></p>
              <a class="footer__ul__li__more" href="<?php echo home_url('/for-company'); ?>">詳しくみる</a>
            </div>
          </li>
          <li class="footer__ul__li">
            <div class="footer-rsp left">
              <p class="footer__ul__li__icon"><img src="<?php echo get_template_directory_uri() ?>/img/グループ 24-min.png" alt="アイコン"></p>
              <h2 class="footer__ul__li__title">登壇者の方へ</h2>
            </div>
            <div class="footer-rsp">
              <p class="footer__ul__li__text"><?php echo get_post_meta(165, 'for-speaker_text', true); ?></p>
              <a class="footer__ul__li__more" href="<?php echo home_url('/for-speaker'); ?>">詳しくみる</a>
            </div>
          </li>
          <li class="footer__ul__li">
            <div class="footer-rsp left">
              <p class="footer__ul__li__icon"><img src="<?php echo get_template_directory_uri() ?>/img/グループ 25-min.png" alt="アイコン"></p>
              <h2 class="footer__ul__li__title">お問い合わせ</h2>
            </div>
            <div class="footer-rsp">
              <p class="footer__ul__li__text"><?php echo get_post_meta(165, 'contact_text', true); ?></p>
              <a class="footer__ul__li__more" href="<?php echo home_url('/contact'); ?>">詳しくみる</a>
            </div>
          </li>
          <li class="footer__ul__li twitter_timeline">
            <a class="twitter-timeline" data-width="100%" data-height="100%" data-theme="light" href="https://twitter.com/freepc_yuki?ref_src=twsrc%5Etfw">Tweets by freepc_yuki</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>  
          </li>
        </ul>
      </div>
      <div class="icon">
        <div class="center">
          <a href="https://twitter.com/freepc_yuki"><img src="<?php echo get_template_directory_uri() ?>/img/footer_Twitter-min.png" alt="icon"></a>
          <a href="https://connpass.com/user/freepc_yuki/"><img src="<?php echo get_template_directory_uri() ?>/img/fotter_connpass-min.png" alt="icon"></a>
        </div>
      </div>
      <h5>©️2020 エンジニアの巣窟</h5>
      
    </footer>
    <?php wp_footer(); ?>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <script src="js/script.js"></script> -->
</body>
</html>