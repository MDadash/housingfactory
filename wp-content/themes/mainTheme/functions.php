<?php
function theme_name_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css');
    wp_enqueue_style( 'font', get_template_directory_uri() . '/css/css_fa/all.min.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
        
    // wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js');
    // wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js');
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

register_nav_menus(array(
  'navbar'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
  'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));
/*Register menu*/

function add_menu_atts( $atts, $item, $args ) {
  $atts['class'] = 'nav-link';
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );



add_theme_support( 'post-thumbnails' );

function do_excerpt($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
  array_pop($words);
  echo implode(' ', $words).'';
}

/**вывод страниц отдельными постами **/
        // add_filter('single_template', 'check_for_category_single_template');
        // function check_for_category_single_template( $t ){
        //     foreach( (array) get_the_category() as $cat ){
        //         if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
        //         if($cat->parent){
        //             $cat = get_the_category_by_ID( $cat->parent );
        //             if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
        //         }
        //     }
        //     return $t;
        // }

remove_filter( 'the_content', 'wpautop' );

add_action( 'admin_print_footer_scripts', 'add_sheensay_quicktags' );

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter('comment_text', 'wpautop');

function add_sheensay_quicktags() {
   if (wp_script_is('quicktags')) :
?>
    <script type="text/javascript">
      if (QTags) {  
        // QTags.addButton( id, display, arg1, arg2, access_key, title, priority, instance );
        QTags.addButton( 'sheens_p', 'p', '<p>', '</p>', 'p', 'Параграф', 1 );
        QTags.addButton( 'sheens_h2', 'h2', '<h2>', '</h2>', 'h', 'Заголовок 2 уровня', 2 );
      QTags.addButton('line', 'line', '<div class="sqare">', '</div>');  
      }
    </script>
<?php endif;
}
?>
