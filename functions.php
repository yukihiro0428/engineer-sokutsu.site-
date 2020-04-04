
<?php
/**
* テーマのセットアップ
* 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support#HTML5
**/
function my_setup() {
add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
add_theme_support('title-tag'); // タイトルタグ自動生成
add_theme_support(
    'html5',
    array( //HTML5でマークアップ
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
));
}

add_action('after_setup_theme', 'my_setup');
// セットアップの書き方の型
// function custom_theme_setup() {
// add_theme_support( $feature, $arguments );
// }
// add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
* CSSとJavaScriptの読み込み
*
* @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
*/
function my_script_init() {
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
    wp_enqueue_style('my', get_template_directory_uri() . '/css/style.css', array(), '1.0.31', 'all');
    wp_enqueue_script('my', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');


//管理バー無視 必要であれば
// add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

/**
* メニューの登録
*
* 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
*/
function my_menu_init() {
    register_nav_menus(
        array(
            'global' => 'ヘッダーメニュー',
            'drawer' => 'ドロワーメニュー',
        )
    );
}
add_action('init', 'my_menu_init');


//固定ページのボックス(背景灰色+反復線形グラデーション)のショートコード用
function shortcode_chat( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'title' => '',
        'text'=> '',
    ), $atts ) );
    $title_text = '<div class="sec06__box"><div class="sec06__box__h1">' . $title . '</div><div class="sec06__box__p">' . $text . '</div></div>';
    return $title_text;
}
add_shortcode( 'box', 'shortcode_chat' );




// メインループの条件分岐
function custom_loop( $query ) {
    // 管理画面や、メインクエリ以外の処理に影響を及ぼさないように
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }

    if ( $query->is_tax('events', 'app') ) {
        $query->set('meta_key', 'eventdate');
        $query->set('orderby', 'meta_value' );
        $query->set('order', 'DESC' );
    }
    if ( $query->is_tax('events', 'guest') ) {
        $query->set('meta_key', 'eventdate');
        $query->set('orderby', 'meta_value' );
        $query->set('order', 'DESC' );
    }
}
add_action( 'pre_get_posts', 'custom_loop' );
      



