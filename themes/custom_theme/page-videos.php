<?php /* Template Name: Página Videos Template */ ?>
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
				"meta_key"       => 'mb_sort_elements_select',
				"order"          => 'ASC',
				"orderby"        => 'meta_value_num',
				"post_status"    => 'publish',
				"post_type"      => 'theme-video',
				"posts_per_page" => -1,
			);

			#Obtener todos los videos
			$all_videos   = get_posts( $args );
			
			#quedarse con la primera o master
			$master_video = $all_videos[0];

		?>
		
		<!-- Contenedor de Videos -->
		<section class="sectionPage__multimedia">

			<!-- Master Video -->
			<div class="itemMultimedia__frame itemMultimedia__frame--master">
				<!-- Título -->
				<h3 class="itemMultimedia__title"> <?= $master_video->post_title; ?> </h3>
				<!-- Frame -->
				<?php 
					$link_video = str_replace( 'watch?v=' , 'embed/' , $master_video->post_content );
				?> 
				<div class="embed-container">
					<iframe src="<?= $link_video; ?>" frameborder="0" width="1132" height="600" allowfullscreen ></iframe>
				</div> <!-- /.embed-container -->

			</div> <!-- /.itemMultimedia__frame itemMultimedia__frame--master -->

			<!-- Carousel de Videos -->
			<?php  
				$args2 = array(
					"meta_key"       => 'mb_sort_elements_select',
					"order"          => 'ASC',
					"orderby"        => 'meta_value_num',
					"post__not_in"   => array( $master_video->ID ),
					"post_status"    => 'publish',
					"post_type"      => 'theme-video',
					"posts_per_page" => -1,
				);

				$carousel_videos = get_posts( $args2 );

				if( count( $carousel_videos >= 1 ) ) :
			?>
				
				<?php foreach( $carousel_videos as $video ): ?>
					
					<!-- Item Video -->
					<div class="itemMultimedia__frame">
						<!-- SubTítulo -->
						<h3 class="itemMultimedia__subtitle text-xs-center"> <?= $video->post_title; ?> </h3>
						<!-- Frame -->
						<?php 
							$link_video = str_replace( 'watch?v=' , 'embed/' , $video->post_content );
						?> 
							<iframe src="<?= $link_video; ?>" frameborder="0" width="270" height="180" allowfullscreen ></iframe>

					</div> <!-- /. -->
				
				<?php endforeach; ?>

				</div> <!-- /.#carousel-video-theme -->

			<?php endif; ?>

			
		</section> <!-- /.sectionPage__multimedia -->

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