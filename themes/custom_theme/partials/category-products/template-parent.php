<?php  
/**
** PLANTILLAS DE CATEGORIA producto PADRE
**/

/* Elementos por página */
$posts_per_page = 9;

#1.- Obtener todos los productos segun esta categoria padre

$args = array(
	'posts_per_page' => -1,
	'post_type'      => 'producto-theme',
	'post_status'    => 'publish',
	'meta_key'       => 'mb_sort_elements_select',
	'orderby'        => 'meta_value_num',
	'order'          => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => $current_taxonomy,
			'field'    => 'slug',
			'terms'    => $current_object->slug,
		),
	),
);

#EL QUERY 
$the_query = new WP_Query( $args );

#Hacer recorrido
if( $the_query->have_posts() ) :

	/* Variable de control para asignar filas */
	$control_row       = 0;	
	/* Item a mostrar por fila */
	$item_per_row      = 3;
	/* Minimo num items  */
	$min_num_per_row   = $item_per_row - 1;
	/* Maximo num items  */
	$max_num_per_row   = $item_per_row + $min_num_per_row;
	
	#Post mostrados 
	$number_show_posts = $the_query->post_count;

	#Si el numero de post es mayor a los post por pagina entonces hacer galeria
	if( $number_show_posts > $posts_per_page ) :
?>

		<!-- Abrir Carousel De Productos -->
		<div id="carousel-productos-theme" class="js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="true" data-autoplay="false">
		
			<?php 
				#Variable de control de section
				$control_section = 0;

				#Hacemos recorrido para mostrar productos
				while( $the_query->have_posts() ): $the_query->the_post();
			?>
				<!-- Abrir SECCIÓN -->
				<?php if( $control_section % $posts_per_page === 0  ) : ?>
					<div class="sectionProducto__container">
				<?php endif; ?>

				<!-- Si tiene imagen destacada -->
				<?php if( has_post_thumbnail() ) : ?>
			
					<!-- Item de Producto -->
					<div class="col-xs-12 col-sm-4">
						
						<article class="itemProducto__preview">
							<!-- Imagen Destacada -->
							<figure class="borderPurpleShadow borderPurpleDarkShadow--big">
								<a href="<?= get_permalink(); ?>">
								<?= get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid') ); ?>
								</a>
							</figure> <!-- /. -->

							<!-- Nombre de Producto -->
							<h3 class="text-xs-center colorPurpleDark"> <?= get_the_title(); ?></h3>

							<!-- Producto ver más -->
							<div class="text-xs-center">
								<a href="<?= get_permalink(); ?>" class="btnCommon__show-more text-uppercase"> 
									<?php _e( "ver más" , LANG  );  ?>
								</a> <!-- / -->
							</div> <!-- /.text-xs-center -->

						</article> <!-- /.itemProducto__preview -->

					</div> <!-- /.col-xs-4 -->
			
				<?php endif; #Fin condicional si tiene imagen  ?>

				<!-- Cerrar SECCIÓN -->
				<?php if( $control_section + 1 === $number_show_posts or ($control_section !== 0 and ($control_section + 1) % $posts_per_page === 0)  ):  ?>
						</div> <!-- /fin de sección -->
				<?php endif; ?>

			<?php $control_section++; endwhile; ?>

		</div> <!-- #fin de carousel de producto -->

		<!-- Contenedor de Sección de Paginación -->
		<section class="pageCommonPagination text-xs-right">
			<?php  
			#Hacer recorrido para setear dots
			$pages = ceil( $number_show_posts / $posts_per_page );
				
			for( $i = 0 ; $i < $pages ; $i++ ) { ?>
			
			<a href="#" data-slider="carousel-productos-theme" data-to="<?= $i; ?>" class="gallery_indicator js-carousel-indicator"> <?= $i+1; ?> 
			</a>

			<?php } ?>
		</section> <!-- /.pageCommonPagination -->

<?php 
	#Si el numero de post es menor o igual a los post por pagina entonces solo mostrar
	else: 

		while( $the_query->have_posts() ): $the_query->the_post();	
?>
		<!-- ABRIR FILA -->
		<?php if( $control_row % $item_per_row === 0  ) : ?><div class="row"><?php endif; ?>

			<!-- Si tiene imagen destacada -->
			<?php if( has_post_thumbnail() ) : ?>
		
				<!-- Item de Producto -->
				<div class="col-xs-12 col-sm-4">
						
					<article class="itemProducto__preview">
						<!-- Imagen Destacada -->
						<figure class="borderPurpleShadow borderPurpleDarkShadow--big">
							<a href="<?= get_permalink(); ?>">
							<?= get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid') ); ?>
							</a>
						</figure> <!-- /. -->

						<!-- Nombre de Producto -->
						<h3 class="text-xs-center colorPurpleDark"> <?= get_the_title(); ?></h3>

						<!-- Producto ver más -->
						<div class="text-xs-center">
							<a href="<?= get_permalink(); ?>" class="btnCommon__show-more text-uppercase"> 
								<?php _e( "ver más" , LANG  );  ?>
							</a> <!-- / -->
						</div> <!-- /.text-xs-center -->

					</article> <!-- /.itemProducto__preview -->

				</div> <!-- /.col-xs-4 -->
		
			<?php endif; #Fin condicional si tiene imagen  ?>

		<!-- CERRAR FILA -->
		<?php if( ($control_row == $number_show_posts - 1 ) || ($number_show_posts <= $item_per_row ) || ( $control_row == $min_num_per_row ) || ($control_row >= $max_num_per_row && ( $control_row - $max_num_per_row ) % $item_per_row == 0  ) ) : ?> 
		</div><!-- /end row --> <?php endif; ?>

	<?php $control_row++; endwhile; ?>

	<!-- Para seguridad Limpiar Floats --> <div class="clearfix"></div>

	<?php endif; ?> <!-- /fin de condicional de post mayores o menores -->


<!-- Si no tiene post -->
<?php else: ?>

	<h2 class="text-uppercase titleCommon__category colorPurple">
		<?= __("No disponible temporalmente. Puede visitar otras líneas de producto. Gracias" , "LANG"); ?>
	</h2>

<?php endif; wp_reset_postdata(); ?>