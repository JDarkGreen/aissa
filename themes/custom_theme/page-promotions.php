<?php /* Template Name: Página Promociones Template */ ?>
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
			** Extraer todas las promociones publicadas
			**/

			$args = array(
				"order"          => 'ASC',
				"orderby"        =>'meta_value_num',
				"paged"          => $paged,
				"post_status"    => 'publish',
				"post_type"      => 'theme-promotion',
				"posts_per_page" => $posts_per_page,
				'meta-key'       => 'mb_sort_elements_select',
			);

			//WP_Query -> promociones 
			$the_query = new WP_Query( $args );

		if( $the_query->have_posts() ) : ?>

		<!-- Contenedor de Promociones -->
		<section class="pagePromotion__content">
			<div class="row">

				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<!-- Artículo o item  -->
					<?php if( has_post_thumbnail() ) : ?>
						<div class="col-xs-12 col-sm-4">
							<article class="itemPromotion">
								<?php 
									#Obtener url de Imágen
									$feat_img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
								?>
								<a href="<?= $feat_img ?>" class="gallery-fancybox">
									<?= get_the_post_thumbnail( get_the_ID() , 'full' , array("class"=>'img-fluid center-block m-x-auto') ); ?>
								</a>
							</article> <!-- /.itemPromotion -->
						</div> <!-- /.col-xs-12 col-sm-4 -->
					<?php endif; ?>
					
				<?php endwhile; ?>

			</div> <!-- /.row -->
		</section> <!-- /.pagePromotion__content -->

		<!-- Contenedor de Páginacion -->
		<section class="pageCommonPagination text-xs-center">
			<?php  
				#Determinar la cantidad de Páginas 
				$pages = $the_query->max_num_pages;
				#Recorrido para mostrar links de páginas
				for ( $i = 1 ; $i <= $pages ; $i++) { 
			?>
				<a class="<?= $paged === $i ? 'active' : ''; ?>" href="<?= get_pagenum_link( $i ); ?>"> <?= $i; ?> </a>	
			<?php } #endfor ?>
		</section> <!-- /.pageCommonPagination -->

		<!-- Separación -->
		<br/>

		<?php endif; wp_reset_postdata(); ?>


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