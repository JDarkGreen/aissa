<?php /* Template Name: Página Blog Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 

	#Variables Para Paginación
	$paged          = get_query_var("paged") ? get_query_var("paged") : 1;
	$posts_per_page = 4;

	/**
		** Extraer todas las categorias de blog 
	**/
	$categories_blog = get_categories( 
		array(
			'hide_empty' => false,
			'meta_key'   => 'meta_order_taxonomy',
			'order'      => 'ASC',
			'orderby'    => 'meta_value_num',
			'parent'     => 0,
		)
	);

	#Extraer la primera categoria o master 
	$master_category = $categories_blog[0];

?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<div class="row">

			<!-- Contenedor de Blog  -->
			<div class="col-xs-12 col-sm-8">

				<section class="pageBlog__content">

				<?php  
					/**
					** Extraer todos los post de blog según la primera categoría
					**/
					$args = array(
						"cat"            => $master_category->term_id , #id de categoria
						"order"          => 'DESC',
						"orderby"        => 'date',
						"post_status"    => 'publish',
						"post_type"      => 'post',
						"posts_per_page" => $posts_per_page,
						"paged"          => $paged,
					);

					$the_query = new WP_Query( $args );

					if( $the_query->have_posts() ) :
				?>
				
					<section>

						<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<!-- Preview del Artículo -->
							<article class="pageBlog__itemPreview">
								
								<div class="row">
									
									<!-- imágen -->
									<div class="col-xs-12 col-sm-4">
										<figure>
											<a href="<?= get_the_permalink(); ?>">
											<?php if( has_post_thumbnail() ) : ?>
											<!-- Mostrar Imagen -->
											<?= get_the_post_thumbnail( get_the_ID() , 'full' , array("class"=>'img-fluid m-x-auto d-block') ); ?>
											<!-- Sino -->
											<?php else: ?>
												<img src="https://unsplash.it/900/688" alt="<?= get_the_title(); ?>" class="img-fluid m-x-auto d-block" />
											<?php endif; ?>
											</a>
										</figure>
									</div> <!-- /. -->

									<!-- contenido -->
									<div class="col-xs-12 col-sm-8">
										
										<!-- Título -->
										<h3 class="text-uppercase"><?= get_the_title(); ?></h3>

										<!-- Extracto -->
										<p>
											<?php  
												$content = wp_strip_all_tags( get_the_content() );
												#limite palabras
												$limit_words = 40;
												#Mostrar palabras
												echo wp_trim_words( $content , $limit_words , '...' );
											?>
										</p>

										<!-- Redes sociales y ver más -->
										<?php  
											/**
											* Incluir Archivo Compartir 
											**/

											$link_share        = get_the_permalink();
											$button_more_share = true;

											include( locate_template("partials/share/shared-buttons.php") );
										?>

										<!-- Limpiar floats --> <div class="clearfix"></div>

									</div> <!-- /.col-xs-12 col-sm-8 -->

								</div> <!-- /.row -->

							</article> <!-- /.pageBlog__itemPreview -->

						<?php endwhile; ?>
						
					</section>

					<!-- Contenedor de Sección de Paginación -->
					<section class="pageCommonPagination text-xs-center">
						<?php  
							$pages = $the_query->max_num_pages;

							for( $i = 1 ; $i<= $pages ; $i++ ) { 
						?>

						<a href="<?= get_pagenum_link($i); ?>" class="<?= $paged == $i ? 'active' : '' ?>"> <?= $i; ?> </a>

						<?php } ?>
					</section> <!-- /.pageCommonPagination -->

				<?php endif; wp_reset_postdata(); ?>

				</section> <!-- /.pageBlog__content -->

			</div> <!-- /. -->

			<!-- Aside de Blog  -->
			<div class="col-xs-12 col-sm-4">
				
				<?php  
					/** 
					** Incluir Plantilla sidebar categories
					**/

					#Parametros
					$categorias         = $categories_blog;
					#$principal_category 
					$principal_category = $master_category;
					#Plantilla
					include( locate_template("partials/common/sidebar-categories.php") );
				?>
			
			</div> <!-- /. -->
			

		</div> <!-- /.row -->


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