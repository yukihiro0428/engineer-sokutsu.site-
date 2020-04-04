//rspナビメニュー
jQuery(function() {

    //モーダルを開いた時のスクロール位置を保持
    var scrollPosition;

    //bodyのスクロール固定
    function bodyFixedOn() {
            // iOSの場合
            scrollPosition = jQuery(window).scrollTop();
            scrollPositionnavheight = scrollPosition + jQuery('.scroll__nav').height();
            jQuery('body').css('position', 'fixed');
            jQuery('body').css('top', '-' + scrollPosition + 'px' );
    }

    //bodyのスクロール固定を解除
    function bodyFixedOff() {
        // iOSの場合
        jQuery('body').css('position', '');
        jQuery('body').css('top', '');
        jQuery(window).scrollTop(scrollPosition);
    }

    //ハンバーガーメニュー動作
    jQuery('.menu-trigger').on('click',function(){
        if(jQuery(this).hasClass('active')){
            jQuery(this).removeClass('active');
            jQuery('.header__list').removeClass('open');
            jQuery('.overlay').removeClass('open');
            jQuery('html').removeClass('scroll-prevent');
            bodyFixedOff();
        } else {
            jQuery(this).addClass('active');
            jQuery('.header__list').addClass('open');
            jQuery('.overlay').addClass('open');
            jQuery('html').addClass('scroll-prevent');
            bodyFixedOn();
        }
        });
        //メニュー以外にもクリックしたら
        jQuery('.overlay').on('click',function(){
        if(jQuery(this).hasClass('open')){
            jQuery(this).removeClass('open');
            jQuery('.menu-trigger').removeClass('active');
            jQuery('.header__list').removeClass('open');
            jQuery('html').removeClass('scroll-prevent');
            bodyFixedOff();
        }
    });
});


jQuery(function(){
    jQuery('[data-modal="overlay"], [data-modal="content"]').hide();
    
    jQuery('[data-modal="button"]').on('click', function(){
      posi = jQuery(window).scrollTop();
      jQuery('[data-modal="fixed"]').css({
        position: 'fixed',
        top: -1 * posi
      });
      jQuery('[data-modal="overlay"], [data-modal="content"]').fadeIn();
    });
    
    jQuery('[data-modal="close"],[data-modal="overlay"]').on('click', function(){
      jQuery('[data-modal="fixed"]').attr('style', '');
      jQuery('html, body').prop({scrollTop: posi});
      jQuery('[data-modal="overlay"], [data-modal="content"]').fadeOut();
    });
  });

//ロゴの表示、非表示 header変化
jQuery(function() {
    var logo = jQuery('#logo_js');    
    //非表示にする
    logo.hide();
    jQuery(window).on('load resize scroll', function() {
        //トップページ->.sec01,
        var distance = Math.round(jQuery('#scroll-js').offset().top);
        var scroll = jQuery(window).scrollTop();
        var winW = jQuery(window).width();
        
        //header変化
        if( scroll > distance - 100 ) {
            jQuery("header nav").addClass("scroll__nav");
            jQuery("header").addClass("scroll__header");
            jQuery(".menu-trigger").addClass("scroll__menu");
        } else if ( scroll < distance - 100 ) {
            jQuery("header nav").removeClass("scroll__nav");
            jQuery("header").removeClass("scroll__header");
            jQuery(".menu-trigger").removeClass("scroll__menu");
        }

        //nav色変化
        //スクロールも考慮
        var transnav = document.getElementById('nav_js');
        var transtwitter = document.getElementById('twitter_js');

        
        if ( 767 > winW ) {
            transnav.style.color= 'white';
        } else if ( scroll > distance - 100 ) {
            transnav.style.color = 'black';
            transtwitter.style.color = 'rgb(0, 103, 170)';
        } else {
            transnav.style.color= 'white';
            transtwitter.style.color = 'rgb(255, 255, 255)';
        }

        //logo変化、スクロールも
        if ( scroll > distance - 100 && winW > 1350 ) {
            logo.fadeIn();
            } else if ( scroll > distance - 100 && 767 > winW ) {
                logo.fadeIn();
            } else {
                logo.fadeOut();
            }
        }
    );
});

