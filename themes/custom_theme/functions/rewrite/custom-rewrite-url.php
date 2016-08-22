<?php  
/**
** Archivo de Configuracion o template que permite reescribir url 
** tanto de taxonomias nuevas como de custom post types;
**/

#Obtener todas las configuraciones
$options = get_option( 'theme_settings' );

global $wpdb,$wp_taxonomies;

$results = $wpdb->term_taxonomy;
var_dump( $wp_taxonomies  ); exit;





