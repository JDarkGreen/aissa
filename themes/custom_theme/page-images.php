<?php /* Template Name: Página Imágenes Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 

	#Variable de paginación
	$paged          = get_query_var("paged") ? get_query_var("paged") : 1;
	#Variable posts por página
	$posts_per_page = 6;
?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">
		

		<?php  
			/**
			** Extraer todas las galerías de imágenes publicadas
			**/

			$args = array(
				"order"          => 'ASC',
				"orderby"        => 'menu_order',
				"post_status"    => 'publish',
				"post_type"      => 'theme-images',
				"posts_per_page" => -1,
			);
			#quedarse con la primera o master
			$gal_images     = get_posts( $args );
			
			$master_gallery = $gal_images[0];

			#Extraer todos los items de fotos de la galería
			$gallery_images_ids = get_post_meta( $master_gallery->ID, 'imageurls_'.$master_gallery->ID , true );

			#Convertir en arreglo
			$gallery_images_ids = explode(",", $gallery_images_ids);
			#Filtrar elementos vacios
			$gallery_images_ids = array_filter( $gallery_images_ids );
			#Filtrar elementos negativos
			$gallery_images_ids = array_diff( $gallery_images_ids , array("-1",-1,"") );
		?>

		<?php
			#Numero de Items por section
			$items_per_section = 6;

			/**
			* Si el número de items es mayor al número de items 
			* por seccion entonces podremos 
			* hacer galerría sino simplemente mostrar fotos
			**/

			if( count($gallery_images_ids) > $items_per_section ) : ?>

				<!-- Contenedor de Carousel Para Multimedia -->
				<?php  
					/*
					*  Attributos disponibles 
					* data-items = number , data-items-responsive = number_mobile ,
					* data-margins = margin_in_pixels , data-dots = true or false 
					*data autoplay = true or false
					*/
				?>

				<div id="carousel-gallery-theme" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="true" data-autoplay="false">

					<?php 

						#Variable de control de section
						$control_section = 0;

						#Hacemos recorrido para mostrar Imágenes
						foreach( $gallery_images_ids as $item_img ) :
						
							#Conseguir todos los datos de este item
							$item = get_post( $item_img  ); #var_dump($item);

							/**
								Datos a usar
								["ID"]["post_author"]["post_date"]["post_date_gmt"]["post_content"]["post_title"]["post_excerpt"]["post_status"]["comment_status"]["ping_status"]["post_password"]["post_name"]["to_ping"]["pinged"]["post_modified"]["post_modified_gmt"]["post_content_filtered"]["post_parent"]["guid"]["menu_order"]["post_type"]["post_mime_type"]["comment_count"["filter]
							**/
						?>

						<!-- Abrir fila -->
						<?php if( $control_section % $items_per_section === 0  ) : ?>
							<div class="sectionPage__multimedia">
						<?php endif; ?>

						<!-- Artículo o Item de Photo -->
						<article class="itemMultimedia">
							<a href="<?= $item->guid; ?>" class="gallery-fancybox">
								<img src="<?= $item->guid; ?>" alt="<?= $item->post_content; ?>" class="img-fluid center-block m-x-auto" />
							</a>
						</article> <!-- /.itemMultimedia -->

						<!-- Cerrar fila -->
						<?php if( $control_section + 1 === count( $gallery_images_ids ) or ($control_section !== 0 and ($control_section + 1) % 6 === 0)  ):  ?>
							</div> <!-- /fin de sección -->
						<?php endif; ?>
							
					<?php $control_section++; endforeach;  ?>

				</div> <!-- /#carousel-gallery-theme -->

				<!-- Contenedor de Sección de Paginación -->
				<section class="pageCommonPagination text-xs-center">
					<?php  
						#Hacer recorrido para setear dots
						$pages = count($gallery_images_ids) / $items_per_section;

						for( $i = 0 ; $i <= $pages ; $i++ ) { ?>

						<a href="#" data-slider="carousel-gallery-theme" data-to="<?= $i; ?>" class="gallery_indicator js-carousel-indicator"> <?= $i+1; ?> 
						</a>

					<?php } ?>
				</section> <!-- /.pageCommonPagination -->

			<?php  
				/**
				* Si el no se supera el número de items requeridos
				**/
				else :
			?>
				
				<!-- Contenedor  -->
				<div class="sectionPage__multimedia">
					
					<?php 
						#Hacemos recorrido para mostrar Imágenes
						foreach( $gallery_images_ids as $item_img ) :
						
							#Conseguir todos los datos de este item
							$item = get_post( $item_img  ); #var_dump($item);

							/**
								Datos a usar
								["ID"]["post_author"]["post_date"]["post_date_gmt"]["post_content"]["post_title"]["post_excerpt"]["post_status"]["comment_status"]["ping_status"]["post_password"]["post_name"]["to_ping"]["pinged"]["post_modified"]["post_modified_gmt"]["post_content_filtered"]["post_parent"]["guid"]["menu_order"]["post_type"]["post_mime_type"]["comment_count"["filter]
							**/
					?>
					<!-- Artículo o Item de Photo -->
					<article class="itemMultimedia">
						<a href="<?= $item->guid; ?>" class="gallery-fancybox">
							<img src="<?= $item->guid; ?>" alt="<?= $item->post_content; ?>" class="img-fluid center-block m-x-auto" />
						</a>
					</article> <!-- /.itemMultimedia -->

					<?php endforeach; ?>
					
				</div> <!-- /.div class="sectionPage__multimedia -->

			<?php endif; ?>

		
		<?php  
			/**
			** Incluir Plantilla de Catálogo
			**/
			include( locate_template("partials/common/section-catalogo-empresa.php") );
		?>

		<!-- Separación -->
		<br/>

	</div> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>