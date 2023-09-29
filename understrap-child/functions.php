<?php
show_admin_bar( false );

function my_style()
{
    wp_enqueue_style('my_style',  get_template_directory_uri()  . "-child/css/my-style.css", array());
    wp_enqueue_script('my_script', get_template_directory_uri() . '-child/js/my-script.js', array( 'jquery' ), '3.0');
}
add_action('wp_enqueue_scripts', 'my_style');
//post type for real estate object
add_action( 'init', 'register_real_estate_object_types' );
function register_real_estate_object_types(){
    register_post_type( 'real_estate_object', [
        'label'  => null,
        'labels' => [
            'name'               => "Об'єкт нерухомості", // основное название для типа записи
            'singular_name'      => 'real_estate_object', // название для одной записи этого типа
            'add_new'            => 'Add new', // для добавления новой записи
            'add_new_item'       => 'Add new', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit post', // для редактирования типа записи
            'new_item'           => 'New post', // текст новой записи
            'view_item'          => 'View post', // для просмотра записи этого типа.
            'search_items'       => 'Search post', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'menu_name'          => "Об'єкти нерухомості", // название меню
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_menu'        => null,
        'show_in_rest'        => null,
        'rest_base'           => null,
        'menu_position'       => null,
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'thumbnail', 'revisions', 'editor', 'page-attributes', ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}