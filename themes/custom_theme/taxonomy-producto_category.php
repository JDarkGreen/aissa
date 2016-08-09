<?php  
/**
** Template Plantilla de Categoría de Productos;
**/

get_header(); 

#Opciones de personalización
$options = get_option("theme_settings");

#Objeto actual 
$current_object = get_queried_object(); 

#OBTENEMOS TODOS LOS CAMPOS PERSONALIZADOS EN EL ADMIN DE ESTE OBJETO - CATEGORIA
$object_option  = get_option( 'taxonomy_' . $current_object->term_id );

#Seteamos la variable banner object de acuerdo al objeto
$banner_object  = $object_option['theme_tax_banner_img'];  

#Seteamos la variable banner title  de acuerdo al objeto
$banner_title   = $current_object->name;  

include( locate_template("partials/common/banner-common-pages.php") ); 

#Si este elemento es padre, es decir si no tiene un hijo interno
# u otros objetos dentro de este elemento entonces 

#Taxonomia actual
$current_taxonomy = $current_object->taxonomy;

if( $current_object->parent === 0 ) :

	$child_terms = get_terms( array(
		'hide_empty' => false,
		'parent'     => $current_object->term_id,
		'taxonomy'   => $current_taxonomy,
	) );

	#Primer Hijo - Elemento
	$first_child_element = $child_terms[0];

else :

	#Entonces este elemento es el hijo actual 
	$first_child_element = $current_object;

endif;

?>


<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Título Elemento -->
		<h2 class="text-uppercase"><?= $first_child_element->name; ?></h2>

		<!-- Contenedor Filas -->
		<div class="row">
			
			<!-- Todos los item - productos -etc de elemento actual -->
			<div class="col-xs-12 col-sm-8">

				<?php  
					#Query o argumentos para los productos u objetos
					$args = array(
						"post_status"    => "publish",
						"post_type"      => "producto-theme",
						"posts_per_page" => -1,
						'meta_key'       => 'mb_sort_elements_select',
						'order'          => 'ASC',
						'orderby'        => 'meta_value_num',
						'tax_query' => array(
							array(
								'taxonomy' => $current_taxonomy,
								'field'    => 'slug',
								'terms'    => $first_child_element->slug,
							),
						),
					); 

					$all_products = get_posts( $args );

					var_dump($all_products);

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