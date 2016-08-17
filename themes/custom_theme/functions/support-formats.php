<?php  

/* Archivo de pagina solo muestra formatos que soporta el tema */

/***********************************************************************************************/
/* Add Theme Support for Post Formats, Post Thumbnails and Automatic Feed Links */
/***********************************************************************************************/
	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video'));

	add_theme_support('category');

	/**
	* Imagen destacada
	**/
	$custom_types   = array();
	$custom_types[] = "post";
	$custom_types[] = "page";
	$custom_types[] = "slider-home";
	$custom_types[] = "producto-theme";
	$custom_types[] = "theme-marcas";
	$custom_types[] = "theme-promotion";
	$custom_types[] = "theme-images";

	add_theme_support('post-thumbnails', $custom_types );

	set_post_thumbnail_size(210, 210, true);

	add_image_size('custom-blog-image', 784, 350);

	add_theme_support('automatic-feed-links');

	//Agregar Excerpt a las páginas
	add_post_type_support('page', 'excerpt');

?>