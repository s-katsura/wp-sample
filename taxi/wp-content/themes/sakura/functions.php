<?php
/*================================================
管理画面 非表示コンテンツ
================================================*/
// adminbar
function mytheme_remove_item( $wp_admin_bar ) {
  $wp_admin_bar->remove_node('updates'); // アップデート通知
  $wp_admin_bar->remove_node('wp-logo'); // Wpロゴ
  $wp_admin_bar->remove_node('comments'); // コメント
//  $wp_admin_bar->remove_node('new-content'); // 新規投稿ボタン
}
add_action( 'admin_bar_menu', 'mytheme_remove_item', 1000 );

// ヘルプ（表示オプション）
function my_admin_head(){
  echo '<style type="text/css">#contextual-help-link-wrap, #screen-options-link-wrap {display:none;}</style>';
}
// add_action('admin_head', 'my_admin_head');

// plugin更新通知
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

// WP更新通知
add_filter('pre_site_transient_update_core', create_function('$a', "return  null;"));

// フッターのWordPressリンク
function custom_admin_footer_text() {
  return false;
}
add_filter('admin_footer_text', 'custom_admin_footer_text');

// フッターのバージョン表記
function custom_admin_footer_update() {
  remove_filter('update_footer', 'core_update_footer');
}
add_action('admin_menu', 'custom_admin_footer_update');

// ページ
function remove_menu() {
  remove_menu_page('index.php');                // ダッシュボード
//  remove_menu_page('edit.php');                 // 投稿
//  remove_menu_page('upload.php');               // メディア
//  remove_menu_page('link-manager.php');         // リンク
//  remove_menu_page('edit.php?post_type=page');  // 固定ページ
  remove_menu_page('edit-comments.php');        // コメント
//  remove_menu_page('themes.php');               // 外観
//  remove_menu_page('plugins.php');              // プラグイン
//  remove_menu_page('users.php');                // ユーザー
//  remove_menu_page('tools.php');                // ツール
//  remove_menu_page('options-general.php');      // 設定
}
add_action('admin_menu', 'remove_menu');

// ダッシュボード
function remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況（概要）
//  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // アクティビティ
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
//  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
//  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
  remove_action( 'welcome_panel', 'wp_welcome_panel' ); // 「ようこそ」
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/*================================================
head内不要タグ削除
================================================*/
// 絵文字用のjavascriptとcss
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// adminbar
add_filter( 'show_admin_bar', '__return_false' );
// generator
remove_action('wp_head', 'wp_generator');
// EditURI
remove_action('wp_head', 'rsd_link');
// wlwmanifestを
remove_action('wp_head', 'wlwmanifest_link');
// コメントフィード
remove_action('wp_head', 'feed_links_extra',3);
// ショートリンク
remove_action('wp_head', 'wp_shortlink_wp_head');
// Embed 機能
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
// next prev
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

/*================================================
css/js バージョン削除
================================================*/
function vc_remove_wp_ver_css_js($src) {
  if(strpos($src, 'ver=')) {
    $src = remove_query_arg('ver', $src);
    return $src;
  }
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

/*================================================
css 管理
================================================*/
function add_styles() {
  wp_enqueue_style('style', get_template_directory_uri(). '/dist/css/style.min.css', false, 'all');
}
add_action('wp_enqueue_scripts', 'add_styles');

/*================================================
js 管理　※フッター
================================================*/
function add_footer_script(){
  wp_enqueue_script('jquery.2.1.4', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array() , false, true);
//  wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array() , false, true);
  if(!is_admin()) {
//    wp_enqueue_script('module', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array() , false, true);
    wp_enqueue_script('module', get_template_directory_uri() . '/dist/js/script.min.js', array() , false, true);
  }
}
add_action('wp_print_scripts', 'add_footer_script');

/*================================================
カスタムメニュー
================================================*/
register_nav_menus(
  array(
    'main_nav' => 'メインナビゲーション',
    'foot_nav' => 'フッターナビゲーション',
  )
);

// 不要なタグ削除
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var){
  return is_array($var) ? array_intersect($var, array('current-menu-item')): '';
}

/*================================================
画像挿入時、bootstrapのレスポンシブ対策クラス名を付与
================================================*/
function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = ''){
  $classes = 'img-responsive center-block'; // separated by spaces, e.g. 'img image-link'
  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class=".*?" \/>/', $html)){
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . '$2', $html);
  }else{
  $html = preg_replace('/(<img.*?)\/>/', '$1 class="' . $classes . '" >', $html);
  }
  return $html;
}
add_filter('image_send_to_editor','give_linked_images_class',10,8);

/*================================================
manual
================================================*/
function page_manual() {
?>
<div class="wrapper">
  <h1>操作マニュアル</h1>
</div>
<?php
}
function manual_page(){
  add_menu_page('投稿マニュアル', '投稿マニュアル', 'manage_options', 'manual', 'manual');
}
add_action ('admin_menu', 'manual_page');

function add_side_menu_manual(){
  //pdfのurlを設定
  $pdf_url = get_bloginfo('template_directory') . '/wp-manual.pdf';
  ?>
  <script type="text/javascript">
    jQuery(function($){
      $ ("#toplevel_page_manual a").attr("href","<?php echo $pdf_url; ?>").attr("target","_blank");
    });
  </script>
<?php
}
add_action('admin_footer', 'add_side_menu_manual');

// アイコンを追加
// https://developer.wordpress.org/resource/dashicons/
function add_manual_icons_styles(){
  // 「menu-posts-custominfo」はhtmlコードを確認
  echo '<style>
  #adminmenu #toplevel_page_manual div.wp-menu-image:before {
    content: "\f331";
  }
  </style>';
}
add_action( 'admin_head', 'add_manual_icons_styles' );

/*================================================
ログイン画面カスタマイズ
================================================*/
// ロゴ
function custom_login_logo() {
  echo '<style>
        body{background-color: #fff !important;}
  </style>';
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

// ロゴリンク先
function custom_login_logo_url() {
  return home_url();
}
add_filter('login_headerurl', 'custom_login_logo_url');
// ロゴタイトル属性
function custom_login_logo_title() {
  return get_option( 'blogname' );
}
add_filter('login_headertitle', 'custom_login_logo_title');

/*================================================
「投稿」を「お知らせ」へ変更
================================================*/
function change_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'お知らせ';
  $submenu['edit.php'][5][0] = '一覧';
  $submenu['edit.php'][10][0] = '新規追加';
  $submenu['edit.php'][16][0] = 'タグ';
  //echo ";
}
function change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'お知らせ';
  $labels->singular_name = 'お知らせ';
  $labels->add_new = _x('新規追加', 'お知らせ');
  $labels->add_new_item = '新規追加';
  $labels->edit_item = '編集';
  $labels->new_item = '新規追加';
  $labels->view_item = '表示';
  $labels->search_items = '検索';
  $labels->not_found = '記事が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

add_filter('wp_title', create_function('$a, $b','return str_replace(" $b ","",$a);'), 10, 2);

/*================================================
テキスト「非公開」削除
===============================================*/
function remove_page_title_prefix($title = '') {
if ( empty( $title ) || !is_page() ) return $title;
$search[0] = '/^' . str_replace('%s', '(.*)', preg_quote(__('Protected: %s'), '/' )) . '$/';
$search[1] = '/^' . str_replace('%s', '(.*)', preg_quote(__('Private: %s'), '/' )) . '$/';
return preg_replace( $search, '$1', $title );
}
add_filter('the_title', 'remove_page_title_prefix');

/*================================================
wpautop無効
===============================================*/
remove_filter( 'the_content', 'wpautop' );

/*================================================
<link rel='dns-prefetch' href='//s.w.org'>削除
===============================================*/
function remove_dns_prefetch($hints, $relation_type) {
  if ('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);