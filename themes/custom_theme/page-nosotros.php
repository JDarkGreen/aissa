<?php /* Template Name: Página Nosotros Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Contenedor Principal -->
<main class="">
	
	<!-- Contenedor Contenido -->
	<section class="pageWrapperLayout pageNosotros">

		<!-- Título de Página --> <h2 class="pageSectionCommon__title pageSectionCommon__title--orange text-uppercase"> <?= __(  $post->post_title , LANG ); ?> </h2>

		<!-- Seccion de Contenido y galería -->
		<section class="pageNosotros__content">
			
			<section class="row">
				<!-- Contenido -->
				<div class="col-xs-12 col-md-6">
					<?= !empty($post->post_content) ? apply_filters("the_content" , $post->post_content  ) : "" ; ?>
				</div> <!-- /.col-xs-12 col-md-6 -->
				<!-- Galería -->
				<div class="col-xs-12 col-md-6">

					<!-- Contenedor Relativo -->
					<section class="containerRelative">
						<!-- Contenedor de Galería [ ] -->
						<?php  
							/*
							*  Attributos disponibles 
							* data-items = number , data-items-responsive = number_mobile ,
							* data-margins = margin_in_pixels , data-dots = true or false 
							*data autoplay = true or false
							*/
						?>

						<div id="carousel-nosotros" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="false" data-autoplay="true">
							<!-- Obtener todas las habitaciones -->
							<?php  
								$input_ids_img  = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
								//convertir en arreglo
								$input_ids_img  = explode(',', $input_ids_img ); 
								//Eliminar numeros negativos
								$remove_array   = array(-1);
								$input_ids_img  = array_diff( $input_ids_img , $remove_array ); 

								//Hacer loop por cada item de arreglo
								foreach ( $input_ids_img as $item_img ) : 
									//Si es diferente de null o tiene elementos
									if( !empty($item_img) ) : 
									//Conseguir todos los datos de este item
									$item = get_post( $item_img  ); 
							?> <!-- Artículo -->
								<article class="item-nosotros relative">
									<!-- Imagen fancybox -->
									<a href="<?= $item->guid; ?>" class="gallery-fancybox">
										<figure><img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" /></figure>
									</a> <!-- /.gallery-fancybox -->
								</article> <!-- /.item-nosotros -->

							<?php endif; endforeach; ?>
						</div> <!-- /.section__single_gallery -->

						<!-- Flechas de Carousel Ocultar en mobile -->
						<div class="text-xs-center hidden-xs-down">
							<!-- Flecha Izquierda -->
							<a href="#" id="" class="js-carousel-prev arrowCarouselNosotros arrowCarouselNosotros-prev" data-slider="carousel-nosotros">
								<i class="fa fa-arrow-left" aria-hidden="true"></i>
							</a>							
							<!-- Flecha Derecha -->
							<a href="#" id="" class="js-carousel-next arrowCarouselNosotros arrowCarouselNosotros-next" data-slider="carousel-nosotros">
								<i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div> <!-- /.text-xs-center  -->	

					</section> <!-- /.relative -->	

				</div> <!-- /.col-xs-12 col-md-6 -->			
			</section> <!-- /.row -->
			
		</section> <!-- /.pageNosotros__content -->
		
		<!-- 2.- Sección Aptitudes -->
		<section class="pageNosotros__aptitudes containerFlex">

			<!-- 2.1 MISION -->
			<?php if( isset($options['theme_mision']) && !empty($options['theme_mision']) ) : ?>
			<article class="pageNosotros__item pageNosotros__mision bgGreenSemiOscuro">
				<!-- Título --> <h3 class="text-capitalize"><?php _e( "misión" , LANG ); ?></h3>	
				<!-- Contenido --> 
				<div class="text-content">
					<?= apply_filters("the_content" , $options['theme_mision'] ); ?>
				</div> <!-- /.text-content -->
			</article> <!-- /.pageNosotros__aptitudes__item -->
			<?php endif; ?>			

			<!-- 2.2 VISION -->
			<?php if( isset($options['theme_vision']) && !empty($options['theme_vision']) ) : ?>
			<article class="pageNosotros__item bgOrangeDark">
				<!-- Título --> <h3 class="text-capitalize"><?php _e( "visión" , LANG ); ?></h3>	
				<!-- Contenido --> 
				<div class="text-content">
					<?= apply_filters("the_content" , $options['theme_vision'] ); ?>
				</div> <!-- /.text-content -->
			</article> <!-- /.pageNosotros__aptitudes__item -->
			<?php endif; ?>

		</section> <!-- /.container -->

	</section> <!-- /.pageWrapper__content -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>