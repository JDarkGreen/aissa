<?php /* Single Name: */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 

	#Página blog 
	$page_blog    = get_page_by_title("blog");
	#Seteamos la variable banner de acuerdo al post o página
	$banner       = $page_blog;  
	$banner_title = "artículos";  

	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<div class="row">
			
			<!-- Contenido -->
			<div class="col-xs-12 col-sm-8">

				<section class="pageBlog__content">

					<!-- Artículo -->
					<article class="articleBlog">

						<!-- Título de blog -->
						<h2 class="text-uppercase titleCommon__category colorPurple">
							<?= $post->post_title; ?>
						</h2>
					
						<!-- Imagen Destacadaa -->
						<figure>
							<?php if( has_post_thumbnail() ): ?>
								<?= get_the_post_thumbnail($post->ID,'full',array('class'=>'img-fluid center-block')); ?>
							<?php else: ?>
								<img src="http://placehold.it/620x348" alt="<?= $post->post_name; ?>" class="img-fluid center-block">
							<?php endif; ?>
						</figure>

						<!-- Contenido del Post -->
						<div class="text-justify">
							<?= apply_filters("the_content" , $post->post_content ); ?>
						</div> <!-- /.text-justify -->
						
					</article> <!-- /.articleBlog -->

				</section> <!-- /.pageBlog__content -->
				
			</div> <!-- /.col-xs-12 col-sm-8 -->


			<!-- Sidebar -->
			<div class="col-xs-12 col-sm-4">

				<?php  
					/** 
					** Incluir Plantilla sidebar categories
					**/

					#Parametros
					$categorias = get_categories( 
						array(
							'hide_empty' => false,
							'meta_key'   => 'meta_order_taxonomy',
							'order'      => 'ASC',
							'orderby'    => 'meta_value_num',
							'parent'     => 0,
						)
					);

					#$principal_category 
					$principal_category = get_the_category( $post->ID );
					$principal_category = $principal_category[0];

					#Plantilla
					include( locate_template("partials/common/sidebar-categories.php") );
				?>
				
			</div> <!-- /.col-xs-12 col-sm-4 -->

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