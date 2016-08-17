<?php /* Sidebar Categorias  y artículos relacionados para el Blog */ ?>

<?php if( isset($categorias) ) : 

//Objeto actual si es taxonomía
$current_term = isset($principal_category) ? $principal_category : get_queried_object() ;

?>

<aside class="sidebarCommon">
	<!-- Titulo de Sidebar --> <h2 class="titleSidebar"> <?php _e( "Categorías" , LANG ); ?></h2>
	
	<!-- Sección de Categorías -->
	<?php foreach( $categorias as $categoria ) : ?>
		<a href="<?= get_term_link( $categoria ); ?>" class="link-to-item <?= $current_term->term_id == $categoria->term_id ? 'active' : '' ?>"><?php _e( $categoria->name , LANG  ); ?>
		<!-- Icon  -->
		<!--i class="fa fa-chevron-right" aria-hidden="true"></i-->
		</a>
	<?php endforeach; ?>

</aside> <!-- /.sidebarServices -->

<?php endif; ?>