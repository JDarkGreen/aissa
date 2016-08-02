<?php  

/***********************************************************************************************/
/* 	Define Constantes */
/***********************************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri() );
define('IMAGES', THEMEROOT.'/assets/images');
define('LANG', 'this-theme-framework');

/***********************************************************************************************/
/* 	Archivos de Condiguración en el Administrador */
/***********************************************************************************************/

/**
* Setear scripts archvos css y javascript de la administracion del tema
**/
//css
require_once("admin/custom-styles.php");
//javascript
require_once("admin/custom-scripts.php");

/**
* Opciones del tema
**/
require_once('functions/admin/options/theme-customizer.php');

/**
* Agregar nuevas columnas 
**/
require_once('functions/admin/custom/new-columns.php');


/***********************************************************************************************/
/* 	Archivos de Condiguración en el Tema  */
/***********************************************************************************************/

/***********************************************************************************************/
/* Cargar archivos JS */
/***********************************************************************************************/

include_once("functions/scripts.php");

/******************************************************************************************/
/* Marcar la navegacion del padre activo cuanto se encuentra en un single post type */
/******************************************************************************************/

include_once("functions/nav-active-parent.php");

/***********************************************************************************************/
/* Registrar Menus */
/***********************************************************************************************/
include_once("functions/menu-register.php");

/***********************************************************************************************/
/* Agregando nuevos tipos de post  */
/***********************************************************************************************/
require_once("functions/add-type-posts.php");

/***********************************************************************************************/
/* Agregar formatos al tema  */
/***********************************************************************************************/
include_once("functions/support-formats.php");

/***********************************************************************************************/
/* Registrar nuevos metabox  */
/***********************************************************************************************/
include_once("functions/add-new-metabox.php");



?>