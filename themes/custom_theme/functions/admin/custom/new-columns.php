<?php  

//Archivo crea nuevas columnas en el panel de administracion de wp
function add_thumbnail_columns( $columns ) {
    $columns = array(
		'cb'             => '<input type="checkbox" />',
		'featured_thumb' => 'Thumbnail',
		'title'          => 'Title',
		'author'         => 'Author',
		'categories'     => 'Categories',
		'tags'           => 'Tags',
		'comments'       => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
		'date'           => 'Date'
    );
    return $columns;
}

function add_thumbnail_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_thumb':
        echo '<a href="' . get_edit_post_link() . '">';
        echo the_post_thumbnail( array(70,70)  );
        echo '</a>';
        break;
    }
}

/**
* Seleccionar o customizar los tipos de posts que ser verán afectados.
**/

$custom_posts_type    = array();
$custom_posts_type[] = "slider-home";
$custom_posts_type[] = "producto-theme";
$custom_posts_type[] = "theme-marcas";


if ( function_exists( 'add_theme_support' ) ) :
    #Hacer el recorrido según los tipos de posts
    foreach( $custom_posts_type as $post_type ) :
        add_filter( "manage_".$post_type."_posts_columns" , 'add_thumbnail_columns' );
        add_action( "manage_".$post_type."_posts_custom_column" , 'add_thumbnail_columns_data', 10, 2 );
    endforeach;
endif;

?>