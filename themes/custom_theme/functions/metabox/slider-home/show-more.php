<?php 
/**
** Metabox que setear si custom post type es destacado o no
**/

/*|-------------------------------------------------------------------------|*/
/*|------------ METABOX SLIDER HOME VER MÁS  --------------------------|*/
/*|-------------------------------------------------------------------------|*/

//Este metabox permite personalizar si es destacado o no
add_action('add_meta_boxes', 'theme_slider_home_show_more');

function theme_slider_home_show_more()
{

	#Array de tipos de post personalizado.
	$custom_post_types   = array();
    $custom_post_types[] = "slider-home";

	add_meta_box( 'mb-featured-custom-post-type', 'Metabox asignar a página', 'theme_mb_slider_home_show_more_cb', $custom_post_types , 'side', 'high' );
}

//Llamar funcion callback
function theme_mb_slider_home_show_more_cb( $post )
{
	$values = get_post_custom( $post->ID );

	$selected = isset( $values['theme_slider_show_more_page'] ) ? esc_attr( $values['theme_slider_show_more_page'][0] ) : '';

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>
    <p>
        <label for="theme_slider_show_more_page"> Asignar a otra página </label>

        <select id="theme_slider_show_more_page" name="theme_slider_show_more_page">

            <option value="#"> No link </option> 

            <?php 

                #todos los post y paginas
                $args = array(
                    "post_status"    => 'publish',
                    "post_type"      => array("post","page"),
                    "posts_per_page" => -1,
                );

                $all_pages = get_posts( $args );

                foreach( $all_pages as $page ) :
            ?>
            <option value="<?= get_permalink($page->ID); ?>" <?php selected( $selected, get_permalink($page->ID) ); ?> > 
                <?= $page->post_title; ?> 
            </option>
            <?php endforeach; ?>

            <?php 
                #Obtener todos los terminos y taxonomias
                $the_terms = get_terms( array(
                    'hide_empty' => false,
                    'taxonomy'   => 'producto_category',
                ) );

                foreach( $the_terms as $the_term ) :
            ?>
                <option value="<?= get_term_link( $the_term ); ?>" <?php selected( $selected, get_term_link( $the_term ) ); ?> > 

                    <?= $the_term->name; ?> 

                </option>
                
            <?php endforeach; ?>

        </select>

    </p>
    <?php        
}

//Guardando la data
add_action( 'save_post', 'cd_slider_home_show_more_save' );
function cd_slider_home_show_more_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    #Obtener Valor Actual de Metabox 
    $current_value  = get_post_meta( $post_id, 'theme_slider_show_more_page' , true );
    
     // Make sure your data is set before trying to save it
    if( isset( $_POST['theme_slider_show_more_page'] ) ) :

        update_post_meta( $post_id, 'theme_slider_show_more_page', esc_attr( $_POST['theme_slider_show_more_page'] ) );

    endif;
     
}
