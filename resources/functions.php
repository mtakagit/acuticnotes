<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

    	
add_action( 'cmb2_admin_init', 'add_test_post' );
function add_test_post() {

    // 特設
    $cmb_2 = new_cmb2_box([
        'id' => 'special_url_box',
        'title' => '基本情報', //メタボックスの表示名
        'object_types' => array('post'), //投稿タイプを指定
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ]);
    $cmb_2->add_field( array(
        'name' => __( '特設ページ URL', 'cmb2' ),
        'id'   => 'special_url',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

  $cmb = new_cmb2_box([
    'id' => '_test_box',
    'title' => 'ショップ登録', //メタボックスの表示名
    'object_types' => array('post'), //投稿タイプを指定
    'context' => 'normal',
    'priority' => 'default',
    'show_names' => true,
  ]);

  	
  $group_field_id = $cmb->add_field( array(
	'id'          => 'wiki_test_repeat_group',
	'type'        => 'group',
	// 'repeatable'  => false, // use false if you want non-repeatable group
	'options'     => array(
		'group_title'       => __( 'ショップ {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'        => __( '他のショップを追加', 'cmb2' ),
		'remove_button'     => __( 'ショップを削除', 'cmb2' ),
		'sortable'          => true,
		// 'closed'         => true, // true to have the groups closed by default
		// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
	),
) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'ショップ名',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'URL',
        'description' => 'Write a short description for this entry',
        'id'   => 'description',
        'type' => 'text_url',
    ) );

    // クレジット




    $cmb_credit = new_cmb2_box([
        'id' => 'credit',
        'title' => 'クレジット', //メタボックスの表示名
        'object_types' => array('post'), //投稿タイプを指定
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ]);
    
    $cmb_credit->add_field( array(
        'name' => 'Test Text Area Code',
        'desc' => 'field description (optional)',
        'default' => 'standard value (optional)',
        'id' => 'wiki_test_textareacode',
        'type' => 'textarea_code',
        'options' => array( 'disable_codemirror' => true )
    ) );
    
/*
    $cmb_3 = new_cmb2_box([
        'id' => 'test_box_3',
        'title' => 'クレジット', //メタボックスの表示名
        'object_types' => array('post'), //投稿タイプを指定
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ]);


    $cmb_3->add_field( array(
        'name' => 'Composer',
        'description' => 'Write a short description for this entry',
        'id'   => 'composer',
        'type' => 'text',
        'repeatable' => true
    ) );

    $cmb_3->add_field( array(
        'name' => 'Illustrator',
        'description' => 'Write a short description for this entry',
        'id'   => 'illustrator',
        'type' => 'text',
        'repeatable' => true
    ) );


    $cmb_3->add_field( array(
        'name' => 'Designer',
        'description' => 'Write a short description for this entry',
        'id'   => 'designer',
        'type' => 'text',
        'repeatable' => true
    ) );

    $cmb_3->add_field( array(
        'name' => 'Web Designer',
        'description' => 'Write a short description for this entry',
        'id'   => 'webdesigner',
        'type' => 'text',
        'repeatable' => true
    ) );


    $cmb_3->add_field( array(
        'name' => 'Mastering',
        'description' => 'Write a short description for this entry',
        'id'   => 'mastering',
        'type' => 'text',
        'repeatable' => true
    ) );
*/
    $cmb_4 = new_cmb2_box([
        'id' => 'test_box_4',
        'title' => 'ショップ登録', //メタボックスの表示名
        'object_types' => array('post'), //投稿タイプを指定
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ]);
    $cmb_4->add_field( array(
        'name'    => 'Test File',
        'desc'    => 'Upload an image or enter an URL.',
        'id'      => 'wiki_test_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
             'type' => array(
             	'image/gif',
             	'image/jpeg',
             	'image/png',
             ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

}
// ジャケット画像
//　特設URL
// クレジット

function add_endpoint() {
	register_rest_route( 'custom/v0', '/works', array(
		'methods' => WP_REST_SERVER::READABLE,
		'callback' => 'get_works_data'
	));
}
add_action('rest_api_init', 'add_endpoint');

function get_works_data() {
  $result = array();  

      $postargs = array(
		  'category_name' => 'work',
        'orderby' => 'date'
      );
      //投稿を全件取得する
      $post_list = get_posts($postargs);
      
      $post_results = array();
      //取得した件数分処理
      foreach( $post_list as $tmppost ){
        //戻り値用にタイトルとURLだけを抜き出す
        array_push( $post_results, array(
          'title' => $tmppost->post_title,
       //   'url' => get_permalink( $tmppost->ID ),
			'body' => $tmppost->post_content
			
        ));
      }
      //データを戻り値用配列に追加する
      array_push( $result, array(
        //投稿情報一覧
        'posts' => $post_results
      ));
    
  return $result;
}