<!-- Header -->
<?php 
	get_header(); 
	# Extraer todas las opciones de personalización
	$options = get_option("theme_settings");
?>

<?php  
/**
* Incluir plantilla de Slider Home
**/
include( locate_template("partials/slider-home/slider-home-revolution.php") );
?>

<!-- CONTENEDOR PÁGINA INICIO -->
<section class="pageInicio__wrapper">

	<!-- Layout -->
	<div class="pageWrapperLayout">

		<!-- 1.- Presentación -->
		<div class="row">

			<!-- Presentación -->
			<div class="col-xs-12 col-sm-8">
				<section class="pageInicio__presentation borderPurpleShadow">
					<!-- Título -->
					<h2 class="titleCommon__section text-uppercase text-xs-center colorPurple">
						<?= __( "aissa secret" , LANG ); ?>
					</h2> <!-- /. -->

					<?php 
						if( isset($options['theme_meta_presentacion']) && !empty($options['theme_meta_presentacion']) ) : 
						echo apply_filters("the_content" , $options['theme_meta_presentacion'] );
						endif;
					?>

					<!-- Botón ver más -->
					<a href="" class="btnCommon__show-more text-uppercase pull-xs-right"> 
						<?php _e( "ver más" , LANG  );  ?>
					</a> <!-- / -->

					<!-- Limpiar Floats --> <div class="clearfix"></div>

				</section> <!-- /.pageInicio__presentation -->
			</div> <!-- /.col-xs- -->

			<!-- Catálogo -->
			<div class="col-xs-12 col-sm-4">
				<section class="pageCommon__catalogo borderPurpleShadow">
					
					<?php  
						#Extraer link catelogo
						$link_catalogo = isset($options['theme_meta_pdf_download']) && !empty($options['theme_meta_pdf_download']) ? $options['theme_meta_pdf_download'] : "#";
					?>

					<a target="_blank" href="<?= $link_catalogo; ?>">
						<img src="<?= IMAGES ?>/catalogo_aissa.jpg" alt="prendas-lencería-peru" class="img-fluid" />
					</a>
				</section> <!-- /. -->
			</div>

		</div> <!-- /.row -->

		<!-- 2.- Productos -->
		<!-- Título -->
		<h2 class="titleCommon__section text-uppercase pull-xs-left colorPurple">
			<?= __( "productos destacados" , LANG ); ?>
		</h2> <!-- /. --> <div class="clearfix"></div>

		<div class="row">
			
			<!-- 1.- Productos destacados -->
			<div class="col-xs-12 col-sm-8">
				<?php  
					#Incluir Plantilla Productos Destacados.
					include( locate_template("partials/products/featured-products.php") );
				?>
			</div> <!-- /.col-xs-8 -->

			<!-- 2.- Sidebar  -->
			<div class="col-xs-12 col-sm-4">
				<aside class="sidebarCommon">
					<?php  
						#Incluir variable para setear todos los menús
						$all_select_menu = "all_select_menu";

						#Incluir Plantilla Sidebar
						include( locate_template("partials/common/sidebar-common.php") );
					?>
				</aside> <!-- /.sidebarCommon -->
			</div> <!-- /. -->

		</div> <!-- /.row -->

		<!-- 3.- Botoneras nuestras Líneas -->
		<section>
		
			<!-- Título -->
			<h2 class="titleCommon__section text-uppercase pull-xs-left colorPurple">
			<?= __( "nuestras líneas" , LANG ); ?>
			</h2> <!-- /. --> <div class="clearfix"></div>

			<!-- BOTONERAS -->
			<section class="pageInicio__botoneras__lineas">
				<div class="row">
					<?php if ( is_active_sidebar( 'sidebar-line-products' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar-line-products' ); ?>
					<?php else: __("Actualizando contenido" , LANG ) ; endif; ?>
				</div> <!-- /.row -->
			</section> <!-- /.pageInicio__botoneras__lineas -->

		</section> <!-- /. -->


		<!-- 4.- Miscelaneo -->
		<section>
			
			<div class="row">
					
				<!-- Novedades -->
				<div class="col-xs-12 col-sm-8">

					<section class="pagePreview_post">
						<!-- Titulo -->
						<h2 class="titleCommon__section text-uppercase pull-xs-left colorPurple">
							<?= __( "eventos & novedades" , LANG ); ?>
						</h2> <!-- /. --> <div class="clearfix"></div>

						<!-- Obtener los 2 ultimos posts random -->
						<?php  
							$args = array(
								'order'          => 'DESC',
								'orderby'        => 'date',
								'post_status'    => 'publish',
								'post_type'      => 'post',
								'posts_per_page' => 2,
							);
							$last_posts = get_posts( $args );

							foreach( $last_posts as $last_post ) :
						?>
							<!-- Articulo preview -->
							<article class="articleItem">
								<div class="row">

									<!-- Imagen Destacada -->
									<div class="col-xs-12 col-sm-3">
										<figure>
											<?php 
												if( has_post_thumbnail( $last_post->ID ) ) : 
													echo get_the_post_thumbnail( $last_post->ID , 'full' , array('class'=>'img-fluid') );
												else: 	
											?>
												<img src="https://placeimg.com/900/688/any" alt="<?= $last_post->post_name; ?>" class="img-fluid" />
											<?php endif; ?>	
										</figure>
									</div> <!-- /.col-xs-12 col-sm-3 -->

									<!-- Texto extracto -->
									<div class="col-xs-12 col-sm-9">

										<?php  
											#1.- Extraer texto contenido y solo mostrar 50 
											# palabras
											$limit_words  = 50;
											$content_text = $last_post->post_content;
											$content_text = wp_trim_words( $content_text , $limit_words );

											#Mostrar 40 palabras
											echo apply_filters("the_content", $content_text);
										?>

										<!-- Botón Ver Más -->
										<a href="<?= get_permalink( $last_post->ID ); ?>" class="btnCommon__show-more text-uppercase pull-xs-right">
										<?= __("ver más" , "LANG" ); ?> </a>

										<!-- Limpiar Floats --> <div class="clearfix"></div>			

									</div> <!-- / -->

								</div> <!-- /.row -->

							</article> <!-- /.articleItem -->

						<?php endforeach; ?>

					</section> <!-- /.pagePreview_post -->

				</div> <!-- /. -->

				<!-- VIDEOS -->
				<div class="col-xs-12 col-sm-4">

					<section class="">
						<!-- Titulo -->
						<h2 class="titleCommon__section text-uppercase text-xs-center colorPurple">
							<?= __( "videos" , LANG ); ?>
						</h2> <!-- /. --> 
						
						<!-- Contenedor de Video -->
						<div class="pageInicio__video__preview containerRelative bgGrayEEE">
							<?php  
								#1.- Extraer solo el post destacado por orden
								$args = array(
									"posts_per_page" => -1,
									"post_type"      => 'theme-video',
									'post_status'    => 'publish',
									'meta_key'       => 'mb_sort_elements_select',
									'orderby'        => 'meta_value_num',
									'order'          => 'ASC',
									'meta_query'     => array(
										array(
											'key'     => 'theme_featured_item_check',
											'value'   => 'on',
											'compare' => '=',
										),
									),
								);

								#2.- Extraer
								$featured_videos = get_posts( $args );
								#3.- Escoger el primer video
								$featured_video = $featured_videos[0];

								#4.- Extraer Contenido
								$link_video = $featured_video->post_content;
								$link_video = str_replace( 'watch?v=' , 'embed/' , $link_video);
							?> 
								<!-- Frame de video -->
								<iframe src="<?= $link_video; ?>" frameborder="0" width="100%" height="243" allowfullscreen ></iframe>

								<!-- Botón redirecciona a galería -->
								<a href="" class="btntoVideos bgGrayC9C9C9">
									<?= __("Ir a Galería Videos" , LANG ); ?>
									<!-- Icono -->
									<i class="fa fa-angle-right colorPurple" aria-hidden="true"></i>
								</a> 

								<!-- Limpiar floats --> <div class="clearfix"></div>

						</div> <!-- /.pageInicio__video__preview -->

					</section> <!-- /. -->

				</div> <!-- /. -->

			</div> <!-- /.row -->

		</section> <!-- /. -->

	</div> <!-- /.pageWrapperLayout -->

</section> <!-- /.pageInicio__wrapper -->


<!-- Footer -->
<?php get_footer(); ?>