<?php  
/** 
* Archivo contiene los nuevos tipos de post registrados
**/

function create_post_type(){

	/*|>>>>>>>>>>>>>>>>>>>> SLIDER HOME  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels = array(
		'name'               => __('Slider Home'),
		'singular_name'      => __('Slider'),
		'add_new'            => __('Nuevo Slider'),
		'add_new_item'       => __('Agregar nuevo Slider Principal'),
		'edit_item'          => __('Editar Slider'),
		'view_item'          => __('Ver Slider'),
		'search_items'       => __('Buscar Slider'),
		'not_found'          => __('Slider no encontrado'),
		'not_found_in_trash' => __('Slider no encontrado en la papelera'),
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => true,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'show_ui' => true,
		'taxonomies'  => array('post-tag','banner_category'),
		'menu_icon'   => 'dashicons-nametag',
	);

	/*|>>>>>>>>>>>>>>>>>>>> SERVICIOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels2 = array(
		'name'               => __('Servicios'),
		'singular_name'      => __('Servicio'),
		'add_new'            => __('Nuevo Servicio'),
		'add_new_item'       => __('Agregar nuevo Servicio'),
		'edit_item'          => __('Editar Servicio'),
		'view_item'          => __('Ver Servicio'),
		'search_items'       => __('Buscar Servicios'),
		'not_found'          => __('Servicio no encontrado'),
		'not_found_in_trash' => __('Servicio no encontrado en la papelera'),
	);

	$args2 = array(
		'labels'      => $labels2,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'servicio_category' , 'post_tag' ),
		'menu_icon'   => 'dashicons-exerpt-view',
	);	

	/*|>>>>>>>>>>>>>>>>>>>> PRODUCTOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels3 = array(
		'name'               => __('Productos'),
		'singular_name'      => __('Producto'),
		'add_new'            => __('Nuevo Producto'),
		'add_new_item'       => __('Agregar nuevo Producto'),
		'edit_item'          => __('Editar Producto'),
		'view_item'          => __('Ver Producto'),
		'search_items'       => __('Buscar Productos'),
		'not_found'          => __('Producto no encontrado'),
		'not_found_in_trash' => __('Producto no encontrado en la papelera'),
	);

	$args3 = array(
		'labels'      => $labels3,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'producto_category' , 'post_tag' ),
		'menu_icon'   => 'dashicons-cart',
	);

	/*|>>>>>>>>>>>>>>>>>>>> GALERÍA VIDEOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels_video = array(
		'name'               => __('Gal. Videos'),
		'singular_name'      => __('Video'),
		'add_new'            => __('Nuevo Video'),
		'add_new_item'       => __('Agregar nuevo Video'),
		'edit_item'          => __('Editar Video'),
		'view_item'          => __('Ver Video'),
		'search_items'       => __('Buscar Videos'),
		'not_found'          => __('Video no encontrado'),
		'not_found_in_trash' => __('Video no encontrado en la papelera'),
	);

	$args_videos = array(
		'labels'      => $labels_video,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-video-alt3',
	);

	/*|>>>>>>>>>>>>>>>>>>>> MARCAS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels_marca = array(
		'name'               => __('Marcas'),
		'singular_name'      => __('Marca'),
		'add_new'            => __('Nueva Marca'),
		'add_new_item'       => __('Agregar nueva Marca'),
		'edit_item'          => __('Editar Marca'),
		'view_item'          => __('Ver Marca'),
		'search_items'       => __('Buscar Marca'),
		'not_found'          => __('Marca no encontrado'),
		'not_found_in_trash' => __('Marca no encontrado en la papelera'),
	);

	$args_marcas = array(
		'labels'      => $labels_marca,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-vault',
	);

	/*|>>>>>>>>>>>>>>>>>>>> PROMOCIONES  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels_promotion = array(
		'name'               => __('Promociones'),
		'singular_name'      => __('Promoción'),
		'add_new'            => __('Nueva Promoción'),
		'add_new_item'       => __('Agregar nueva Promoción'),
		'edit_item'          => __('Editar Promoción'),
		'view_item'          => __('Ver Promoción'),
		'search_items'       => __('Buscar Promoción'),
		'not_found'          => __('Promoción no encontrada'),
		'not_found_in_trash' => __('Promoción no encontrada en la papelera'),
	);

	$args_promotions = array(
		'labels'      => $labels_promotion,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-thumbs-up',
	);


	/*|>>>>>>>>>>>>>>>>>>>> REGISTRAR  <<<<<<<<<<<<<<<<<<<<|*/
	register_post_type( 'slider-home' , $args  );

	register_post_type( 'servicio' , $args2 );

	register_post_type( 'producto-theme' , $args3 );

	#Galería Videos
	register_post_type( 'theme-video' , $args_videos );	

	#Marcas
	register_post_type( 'theme-marcas' , $args_marcas );

	#Promociones
	register_post_type( 'theme-promotion' , $args_promotions );

	flush_rewrite_rules();
}

add_action( 'init', 'create_post_type' );


?>