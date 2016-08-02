<?php 
/**
** Metabox que agrega un orden según el tipo de post en el que se 
** encuentre uno.
**/

/*|-------------------------------------------------------------------------|*/
/*|------------ METABOX ORDEN CUSTOM POST TYPE ----------------------------|*/
/*|-------------------------------------------------------------------------|*/


//Este metabox permite personalizar EL orden
add_action('add_meta_boxes', 'theme_sort_item_custom_post_type');

function theme_sort_item_custom_post_type()
{

	#Array de tipos de post personalizado.
	$custom_post_types   = array();
	$custom_post_types[] = "slider-home";

	add_meta_box( 'mb-sort-custom-post-type', 'Orden de Elementos', 'theme_mb_sort_elements_cb', $custom_post_types , 'side', 'high' );
}

//customizar box
function theme_mb_sort_elements_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
    <p>
    	<?php 
    		#Obtener tipo de post de este elemento
    		$this_get_post_type = get_post_type( $post );
    	?>
        <label for="mb_sort_elements_select"> Ordenar este Elemento: <br />
        	<b style="text-transform:uppercase;"><?= $this_get_post_type ?> </b> <br/>
        	<b> Se colocará este elemento después de este Ítem. </b> <br/>
        </label>

        <!-- SELECT element sort -->
        <select name="mb_sort_elements_select" id="mb_sort_elements_select">
        	<?php
        		#Obtener todos los posts según el tipo de post
        		$args = array(
					'posts_per_page' => -1,
					'post_status'    => 'publish',
					'post_type'      => $this_get_post_type,
					'post__not_in'   => array( $post->ID ),
        		);
        		$all_posts = get_posts( $args );

        		#variable control id
        		$control_id = 0;

        		foreach ( $all_posts as $this_custom_post ) :

        			#Extraer su valor 
        			$this_meta_order = !empty( get_post_meta( $this_custom_post->ID , "mb_sort_elements_select" , true ) ) ? get_post_meta( $this_custom_post->ID , "mb_sort_elements_select" , true ) : $control_id;

        	?>	<option value="<?= $this_meta_order; ?>"> 
        			<?= $this_custom_post->post_title . " - ID: " . $this_custom_post->ID ?> 
        		</option>
        	<?php $control_id++; endforeach; ?>
        </select> 

        <br/>

        <div>Orden Actual : <?= get_post_meta( $post->ID , "mb_sort_elements_select" , true ); ?></div>
    </p>
    <?php    
}
