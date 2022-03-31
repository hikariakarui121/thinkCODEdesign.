<?php
/**
 * アイキャッチ画像
 */

add_action('init', function(){
  add_theme_support('post-thumbnails');
  });
add_filter('jpeg_quality', function($arg){return 100;});

/**
 *抜粋の追加
 */

add_post_type_support('page','excerpt');

/**
 * アーカイブページ登録
 */

function post_has_archive( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'news'; 
		$args['label'] = 'news'; 
		$args['supports'] = array('comments' => false);
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

/**
 * カスタム投稿タイプ追加　
 */
add_action('init', function(){
	register_post_type('blog',[
		'public' => true,
		'label'  => 'blog',
		'menu_position' =>4,
		'has_archive'  => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
	]);
  register_taxonomy_for_object_type('post_tag', 'blog');
});

add_action('init', function(){
	register_post_type('works',[
		'public' => true,
		'label'  => 'works',
		'menu_position' =>4,
		'has_archive'  => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
	]);
  register_taxonomy_for_object_type('post_tag', 'works');
});



/**
 * ページネーション
 */

function mytheme_pagenation(){
  global $wp_query;
  if($wp_query -> max_num_pages <=1)
  return;
  echo '<nav class="pagenation">';
  echo paginate_links( array(
   'total' => $wp_query->max_num_pages,
   'prev_next' => true,
   'next_text' => __('&rarr;'),
   'prev_text' => __('&larr;'),
 ) );
  echo '</nav>';
}

/**
 * 概要（抜粋）の省略文字
 */
function new_excerpt_more($more) {
  return '';
  }
  add_filter('excerpt_more', 'new_excerpt_more');

  function new_excerpt_length( $length ) {
    return 300; 
}       
add_filter( 'excerpt_length', 'new_excerpt_length', 999 );


/**
 * メインループの表示件数を2件に！
 */
function my_pre_get_posts( $query ) {
  if ( is_admin() || ! $query -> is_main_query() ) return;
  
    if ( $query->is_home ) {
    $query->set( 'posts_per_page', '2' );
    $query->set( 'orderby', 'DESC' );
    }
  
  }
  add_action( 'pre_get_posts', 'my_pre_get_posts' );


/**
 * 投稿ページのパーマリンクをカスタマイズ
 */	
function add_article_post_permalink( $permalink ) {
    $permalink = '/news' . $permalink;
    return $permalink;
}
add_filter( 'pre_post_link', 'add_article_post_permalink' );
 
function add_article_post_rewrite_rules( $post_rewrite ) {
    $return_rule = array();
    foreach ( $post_rewrite as $regex => $rewrite ) {
        $return_rule['news/' . $regex] = $rewrite;
    }
    return $return_rule;
}
add_filter( 'post_rewrite_rules', 'add_article_post_rewrite_rules' );

/**
 * 抜粋の取得
 */	
function ltl_get_the_excerpt($post_id){
  global $post;
  $post_bu = $post;
  $post = get_post($post_id);
  $output = get_the_excerpt();
  $post = $post_bu;
  return $output;
}

 /**
 * モバイル定義
 */	
function is_mobile() {
    $useragents = array(
        'iPhone',          // iPhone
        'iPod',            // iPod touch
        '^(?=.*Android)(?=.*Mobile)', // 1.5+ Android
        'dream',           // Pre 1.5 Android
        'CUPCAKE',         // 1.5+ Android
        'blackberry9500',  // Storm
        'blackberry9530',  // Storm
        'blackberry9520',  // Storm v2
        'blackberry9550',  // Storm v2
        'blackberry9800',  // Torch
        'webOS',           // Palm Pre Experimental
        'incognito',       // Other iPhone browser
        'webmate'          // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}