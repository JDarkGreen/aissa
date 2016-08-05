<?php /* Template Name: Página Nosotros Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Contenedor Flexible -->
		<div class="containerFlex containerSpaceBetween">
			
			<!-- SECCION DE CONTENIDO -->
			<section class="pageNosotros__item pageNosotros__content borderGrayBackgroundWhite">
				
				<!-- 1.- Contenido de Nosotros -->
				<section>
					<?php  
						#1.- Contenido Nosotros
						$content_text = $post->post_content;
						#MOSTRAR
						echo apply_filters( "the_content" , $content_text );
					?>
				</section>

				<!-- 2.- Item Visión -->
				<div class="pageNosotros__aptitud">
					<!-- Titulo --> <h2 class="text-uppercase"><?= __( "visión" , LANG ); ?></h2>
					<!-- Contenido -->
					<?php 
						if( isset($options["theme_vision"]) && !empty($options["theme_vision"]) ) :
							echo apply_filters( "the_content" , $options["theme_vision"] );
						endif; 
					?>
				</div> <!-- /. -->

				<!-- 2.- Item Misión -->
				<div class="pageNosotros__aptitud">
					<!-- Titulo --> <h2 class="text-uppercase"><?= __( "misión" , LANG ); ?></h2>
					<!-- Contenido -->
					<?php 
						if( isset($options["theme_mision"]) && !empty($options["theme_mision"]) ) :
							echo apply_filters( "the_content" , $options["theme_mision"] );
						endif; 
					?>
				</div> <!-- /. -->

			</section> <!-- /.pageNosotros__item -->

			<!-- SECCION DE GALERÍA -->
			<section class="pageNosotros__item containerRelative">
				
				<!-- Contenedor de Galería [ ] -->
				<?php  
					/*
					*  Attributos disponibles 
					* data-items = number , data-items-responsive = number_mobile ,
					* data-margins = margin_in_pixels , data-dots = true or false 
					*data autoplay = true or false
					*/
				?>

				<div id="carousel-nosotros-theme" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="true" data-autoplay="true">
					<!-- Obtener todas las habitaciones -->
					<?php  
						$input_ids_img  = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
						//convertir en arreglo
						$input_ids_img  = explode(',', $input_ids_img ); 
						//Eliminar numeros negativos
						$remove_array   = array(-1,'-1');
						$input_ids_img  = array_diff( $input_ids_img , $remove_array ); 
						$input_ids_img  = array_filter( $input_ids_img );

						//Hacer loop por cada item de arreglo
						foreach ( $input_ids_img as $item_img ) : 
							//Si es diferente de null o tiene elementos
							if( !empty($item_img) ) : 
							//Conseguir todos los datos de este item
							$item = get_post( $item_img  ); 
					?> <!-- Artículo -->
						<article>
							<!-- Imagen fancybox -->
							<a href="<?= $item->guid; ?>" class="gallery-fancybox">
								<figure><img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" /></figure>
							</a> <!-- /.gallery-fancybox -->
						</article> <!-- /.item-nosotros -->

					<?php endif; endforeach; ?>
				</div> <!-- /.section__single_gallery -->

				<!-- Indicadores de Galería - Personalizado -->
				<section class="gallery_indicators text-xs-center">
					<?php 	
						$control = 0;
						foreach ( $input_ids_img as $item_img ) :  
					?>
						<a href="#" data-slider="carousel-nosotros-theme" data-to="<?= $control; ?>" class="gallery_indicator js-carousel-indicator <?= $control == 0 ? 'active' : ''  ?>"></a>

					<?php $control++; endforeach; ?>
				</section> <!-- /.gallery_indicators -->
				
			</section> <!-- /.pageNosotros__item -->

		</div> <!-- /.containerFlex containerSpaceBetween -->

		<!-- 2.- NUESTRAS MARCAS -->
		<?php  
			include( locate_template("partials/common/section-marcas-empresa.php") );
		?>

		<?php  
			/**
			** Incluir Plantilla de Catálogo
			**/
			include( locate_template("partials/common/section-catalogo-empresa.php") );
		?>
		
	</div> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>