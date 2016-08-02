<?php  
/**
** Archivo Single: Especie Maderalia
**/

get_header(); 
$options = get_option("theme_settings");

global $post; //Objeto actual - Pagina 

#Buscamos página de especies
$page_especies = get_page_by_title("especies");
$banner = $page_especies;  // Seteamos la variable banner de acuerdo a la página o post
include( locate_template("partials/common/banner-common-pages.php") ); 

?>

<!-- Contenedor Principal -->
<main class="">
	
	<!-- Contenedor Contenido -->
	<section class="pageWrapperLayout pageEspecies">

		<!-- CONTENIDO -->
		<div class="row">

			<!-- ASIDE DE PRODUCTOS -->
			<div class="col-xs-12 col-md-4">
				<!-- Sidebar -->
				<aside class="pageCommon__sidebar">
					<?php  
						# Incluir Template Productos
						include( locate_template("partials/common/sidebar-products.php") );
					?>

					<!-- Incluir Facebook -->
					<?php
						if( isset( $options['theme_social_fb_text'] ) && !empty( $options['theme_social_fb_text'] ) ) :
					?>
						<section class="container__facebook hidden-xs-down">
							<!-- Contebn -->
							<div id="fb-root" class=""></div>

							<!-- Script -->
							<script>(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>

							<div class="fb-page" data-href="<?= $options['theme_social_fb_text']; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="313" data-height="395" data-hide-cover="false" data-show-facepile="true">
							</div> <!-- /. fb-page-->
						</section> <!-- /.container__facebook -->
					<?php else: ?>
						<p class="text-xs-center">Opcion no habilitada temporalmente</p>
					<?php endif; ?>					

				</aside> <!-- /.pageCommon__sidebar -->
			</div> <!-- /.col-md-4 -->	
		
			<!-- INFORMACIÓN DE ESPECIE -->
			<div class="col-xs-12 col-md-8">
				
				<!-- Título de Página --> <h2 class="pageSectionCommon__title pageSectionCommon__title--orange text-uppercase"> <?= __(  "especies" , LANG ); ?> </h2>

				<!-- Limpiar floats --> <div class="clearfix"></div>

				<!-- Contenedor de Especies -->
				<article class="articleSingleEspecie">
					<div class="row">
						
						<!-- IMAGEN -->
						<div class="col-xs-12 col-md-9">
							<figure>
								<?php 
									if( has_post_thumbnail( $post->ID ) ) : 
										echo get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid center-block imgNotBlur') );
									endif;
								?>
							</figure>
						</div> <!-- /.col-xs-9 -->

						<!-- TEXTO O CONTENIDO -->
						<div class="col-xs-12 col-md-3">
							<div class="articleSingleEspecie__content">
								
								<!-- Titulo -->
								<h1 class="text-capitalize"><?php _e( $post->post_title , LANG ); ?></h1>

								<!-- Párrafo -->
								<?= apply_filters("the_content" , $post->post_content ); ?>

								<!-- Separación  --> <br/>
								
								<!-- Botón Regresar -->
								<a href="<?= get_permalink( $page_especies->ID ); ?>" class="btnCommon__show-more pull-xs-right"><?php _e( "Ver más" , LANG ); ?></a>

								<!-- Limpiar floats --> <div class="clearfix"></div>

							</div> <!-- /.articleSingleEspecie__content -->
						</div> <!-- /.col-xs-3 -->
						
					</div> <!-- /.row -->
				</article> <!-- /.articleSingleEspecie-->

			</div> <!-- /.col-md-8 -->

		</div> <!-- /.row -->

	</section> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>