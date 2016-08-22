<?php  
/**
** PLANTILLAS DE CATEGORIA producto HIJO
**/

#Query o argumentos para los productos u objetos
$args = array(
	"post_status"    => "publish",
	"post_type"      => "producto-theme",
	"posts_per_page" => -1,
	'meta_key'       => 'mb_sort_elements_select',
	'order'          => 'ASC',
	'orderby'        => 'meta_value_num',
	'tax_query' => array(
		array(
			'taxonomy' => $current_taxonomy,
			'field'    => 'slug',
			'terms'    => $current_object->slug,
		),
	),
); 

$the_query = new WP_Query( $args ); #var_dump($all_products);

#Ejecutar el loop del query
if( $the_query->have_posts() ) :
while( $the_query->have_posts() ) : $the_query->the_post();
?>

<!-- Artículo preview de Categoría de Producto -->
<article class="productoItemPreview">
	<div class="row">

		<!-- Imagen -->
		<div class="col-xs-12 col-sm-5">
			
			<figure class="borderPurpleShadow borderPurpleDarkShadow--big">
				<a href="<?= get_the_permalink(); ?>">
				<?php  
					if( has_post_thumbnail() ) :
						echo get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid') );
					endif;
				?>
				</a>
			</figure> <!-- /.end figure -->

		</div> <!-- /.col-xs-12 col-sm-4 -->

		<!-- Texto -->
		<div class="col-xs-12 col-sm-7">
			
			<div class="productoItemPreview__content">
				
				<!-- Titulo -->
				<h3 class="text-uppercase"> <?= get_the_title(); ?></h3>

				<!-- El Código -->
				<h4 class="text-xs-uppercase"> 
				<?php 
					$code_product = get_post_meta( $post->ID , 'mb_code_product_text' , TRUE );
					echo !empty($code_product) ? $code_product : "";
				?> 
				</h4>

				<!-- El extracto -->
				<?php  
					$limit_words = 15;

					$the_excerpt = strip_tags( get_the_excerpt() );
					$the_excerpt = wp_trim_words( $the_excerpt , $limit_words , "..." );

					$the_content = strip_tags( get_the_content() );
					$the_content = wp_trim_words( $the_content , $limit_words , "..." );

					if( !empty($the_excerpt) ) :
						echo apply_filters( "the_content", $the_excerpt );
					else:
						echo apply_filters( "the_content", $the_content );
					endif;
				?>

				<!-- La separación --> <br><br>

				<!-- Botón de ver más -->
				<a href="<?= get_the_permalink(); ?>" class="btnCommon__show-more text-uppercase">
					<?= __( "ver más" , "LANG" ); ?> </a>

				<!-- Separación -->
				<br><br><br>

				<!-- Sección Compartir -->
				<?php 
					#Setear id_compartir
					$id_share   = get_the_ID();
					#Setear link compartir 
					$link_share = get_the_permalink();
					#Setear link title 
					$link_title = get_the_title();

					#Plantilla 
					include(locate_template("partials/share/shared-buttons.php") ); 
				?>

			</div> <!-- /.productoItemPreview__content -->

		</div> <!-- /.col-xs-12 col-sm-8 -->
		
	</div> <!-- /.row -->
</article> <!-- /.productoItemPreview -->

<?php endwhile; ?>

<?php else: ?>

<h2 class="text-uppercase titleCommon__category colorPurple">
	<?= __("No disponible temporalmente. Puede visitar otras líneas de producto. Gracias" , "LANG"); ?>
</h2>

<?php endif; wp_reset_postdata(); ?>

