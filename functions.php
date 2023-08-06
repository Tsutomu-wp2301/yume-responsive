<?php 

// テーマサポート
function yume_responsive_setup() {
    add_theme_support('menus');
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size('page_eyecatch', '581', '358', true);
}
add_action('after_setup_theme', 'yume_responsive_setup');

// タイトル出力
// function yume_responsisve_title( $title ) {
//     if ( is_front_page() && is_home() ) { //トップページなら
//         $title = get_bloginfo( 'name', 'display' );
//     } elseif ( is_singular() ) { //シングルページなら
//         $title = single_post_title( '', false );
//     }
//         return $title;
// }
// add_filter( 'pre_get_document_title', 'yume_responsive_title' );  


// スタイルシート、JSファイルの読み込み
function add_files(){
    // CSSファイルの読み込み
    wp_enqueue_style('my_style', get_template_directory_uri().'/css/style.css', array(),date('ymdHis', filemtime( get_template_directory().'/css/style.css' )));

    // グーグルフォントの読み込み
    wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', array(),'1.0.0');


    // jQueryの読み込み
    wp_enqueue_script( 'jQuery', get_theme_file_uri( '/JS/jQuery.js' ), array(), '1.0.0', true );

    // JSファイルの読み込み
    wp_enqueue_script('fadeIn_script', get_template_directory_uri().'/JS/fadeIn.js', array(),'1.0.0',true);
    wp_enqueue_script('fadeOut_script', get_template_directory_uri().'/JS/fadeOut.js', array(),'1.0.0',true);
    wp_enqueue_script('toggle_class_open_script', get_template_directory_uri().'/JS/toggle-class--open.js', array(),'1.0.0',true);
    wp_enqueue_script('underLine_script', get_template_directory_uri().'/JS/underLine.js', array(),'1.0.0',true);
    wp_enqueue_script('mediaList_script', get_template_directory_uri().'/JS/mediaList.js', array(),'1.0.0',true);

}
add_action('wp_enqueue_scripts', 'add_files');


// ウィジェットの追加
// function hamburgerSite_widgets_init() {
//     register_sidebar (
//         array(
//             'name'          => 'サイドメニューウィジェット',
//             'id'            => 'sideMenu_widget',
//             'description'   => 'サイドメニュー用ウィジェットです',
//             'before_widget' => '<div id="%1$s" class="widget %2$s">',
//             'after_widget'  => '</div>',
//             'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
//             'after_title'   => "</h2>\n",
//         )
//     );
// }
// add_action( 'widgets_init', 'hamburgerSite_widgets_init' );


// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type){
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'archives'; // 任意のスラッグ名
        $args['label'] = '投稿'; // ”投稿”の表示を”商品紹介”に変更
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


// サーチページの投稿表示件数を設定
function custom_search_posts_per_page($query) {
    if ($query->is_search) {
      $query->set('posts_per_page', 5);
    }
    return $query;
}
add_filter('pre_get_posts', 'custom_search_posts_per_page');


//アーカイブページで投稿数を6件にする
function custom_archive_posts_per_page($query) {
    if (!is_admin() && (is_tax() || is_post_type_archive() || is_category() || is_tag())) {
        $query->set('posts_per_page', 6);
    }
    return $query;
}
add_filter('pre_get_posts', 'custom_archive_posts_per_page');





// YARPPのrelated.cssを削除
function crunchify_dequeue_footer_styles()
{
  wp_dequeue_style('yarppRelatedCss');
}
add_action('get_footer','crunchify_dequeue_footer_styles');


function add_post_category_archive( $wp_query ) {
    if ($wp_query->is_main_query() && $wp_query->is_category()) {
    $wp_query->set( 'post_type', array('post','article'));
    }
    }
add_action( 'pre_get_posts', 'add_post_category_archive' , 10 , 1);