<?php
function theme_name_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css');
    wp_enqueue_style( 'font', get_template_directory_uri() . '/css/css_fa/all.min.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
        
    // wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('jquery-mask', get_template_directory_uri() . '/js/jquery.mask.js');
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

//Phonenumber
function my_more_options(){
    add_settings_field('phone','Телефон','display_phone','general');
    register_setting('general','my_phone');
}
add_action('admin_init','my_more_options');
function display_phone(){
    echo "<input type='text' name='my_phone' value='".esc_attr(get_option('my_phone'))."'>";
}
//Second phonenumber
function my_more_sp_options(){
    add_settings_field('second_phone','Телефон #2','display_second_phone','general');
    register_setting('general','my_second_phone');
}
add_action('admin_init','my_more_sp_options');
function display_second_phone(){
    echo "<input type='text' name='my_second_phone' value='".esc_attr(get_option('my_second_phone'))."'>";
}
//Email
function my_email_options(){
    add_settings_field('email','Email','display_email','general');
    register_setting('general','email');
}
add_action('admin_init','my_email_options');
function display_email(){
    echo "<input type='text' name='email' value='".esc_attr(get_option('email'))."'>";
}
//Address
function my_address_options(){
    add_settings_field('address','Адрес','display_address','general');
    register_setting('general','address');
}
add_action('admin_init','my_address_options');
function display_address(){
    echo "<input type='text' name='address' value='".esc_attr(get_option('address'))."'>";
}
//Address
function my_address2_options(){
    add_settings_field('address2','Адрес 2','display_address2','general');
    register_setting('general','address2');
}
add_action('admin_init','my_address2_options');
function display_address2(){
    echo "<input type='text' name='address2' value='".esc_attr(get_option('address2'))."'>";
}


add_theme_support( 'post-thumbnails' );

function do_excerpt($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
  array_pop($words);
  echo implode(' ', $words).'';
}

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
