<?php  
/**
** Template Plantilla de Categoría de Productos;
**/

get_header(); 

#Opciones de personalización
$options = get_option("theme_settings");

#Objeto actual 
$current_object = get_queried_object(); 

#ASIGNAR ELEMENTO PRIMER ELEMENTO PADRE PARA SETEAR EL BANNER
$termParent = ($current_object->parent == 0) ? $current_object : get_term( $current_object->parent );

#OBTENEMOS TODOS LOS CAMPOS PERSONALIZADOS EN EL ADMIN DE ESTE OBJETO - CATEGORIA PADRE
$object_parent_option  = get_option( 'taxonomy_' . $termParent->term_id );

#OBTENEMOS TODOS LOS CAMPOS PERSONALIZADOS EN EL ADMIN DE ESTE OBJETO - CATEGORIA ACTUAL
$object_current_option = get_option( 'taxonomy_' . $current_object->term_id );

#Obtener imágen de esta taxonomía
$image_current_tax = !empty( $object_current_option['theme_tax_banner_img'] ) ? $object_current_option['theme_tax_banner_img'] : $object_parent_option['theme_tax_banner_img'];

#Seteamos la variable banner object de acuerdo al objeto
$banner_object  =   $image_current_tax;

#Seteamos la variable banner title  de acuerdo al objeto
$banner_title   = $current_object->name;  

include( locate_template("partials/common/banner-common-pages.php") ); 

#Si este elemento es padre, es decir si no tiene un hijo interno
# u otros objetos dentro de este elemento entonces 

#Taxonomia actual
$current_taxonomy = $current_object->taxonomy;

/**
* Setear ELEMENTO para comparar ID de menú activo o current
*/

$id_current_element = $current_object->term_id;


?>


<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Título Elemento -->
		<h2 class="text-uppercase titleCommon__category colorPurple">
			<?= $current_object->name; ?>
		</h2>

		<!-- Contenedor Filas -->
		<div class="row">
			
			<!-- Todos los item - productos -etc de elemento actual -->
			<div class="col-xs-12 col-sm-8">
			
			<?php 
				#Redirección para plantillas padre e Hijos

				#Si es plantilla padre
				if( $current_object->parent === 0 ) :

					include( locate_template("partials/category-products/template-parent.php") );

				#Si es plantilla Hijo
				else:

					include( locate_template("partials/category-products/template-child.php") );

				endif;

			?>


			</div> <!-- col-xs-12 col-sm-8 -->


			<!-- Sidebar de Productos -->
			<div class="col-xs-12 col-sm-4">
				
				<aside class="sidebarCommon">
					<?php  
						#Incluir Plantilla Sidebar
						include( locate_template("partials/common/sidebar-common.php") );
					?>
				</aside> <!-- /.sidebarCommon -->

			</div> <!-- /.col-xs-12 col-sm-4 -->

		</div> <!-- /.row -->

	</div> <!-- /.pageWrapperLayout -->

</main> <!-- /pageContentLayout -->

<!-- Footer -->
<?php get_footer(); ?>