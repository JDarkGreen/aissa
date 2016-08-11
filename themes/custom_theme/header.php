<?php  
/**
* Plantilla Archivo: Header
**/
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<?php
	# Extraer todas las opciones de personalización
	$options   = get_option("theme_settings");
	# Comprobar si esta desplegada la barra de Navegación
	$admin_bar = is_admin_bar_showing() ? 'mainHeader__active' : '';
?>

<!-- Contenedor Versión Desktop -->
<header class="mainHeader bgPink hidden-xs-down">

	<!-- Primera sección Contenedor de Información y Pedido -->
	<?php  
		# Extraemos el logo de las opciones del tema
		$logo_theme = isset($options['theme_meta_logo_text']) && !empty($options['theme_meta_logo_text']) ? $options['theme_meta_logo_text'] : IMAGES . '/logo.png';
	?>

	<!-- Contenedor 1.ra sección Información Header -->
	<section class="pageWrapperLayout">

		<!-- Incluir plantilla - Sección Redes sociales -->
		<?php  
			#clase variación
			$social_variation = "colorPurple";
			#plantilla
			include( locate_template("partials/social-network/social-links.php") );
		?>

		<div class="row mainHeader__content">

			<!-- Logo -->
			<div class="col-md-5 offset-md-3">
				<h1 class="logo text-xs-center">
					<span class="colorPurple"> Aissa </span> Secret 
				</h1> <!-- /.logo -->
			</div> <!-- /.col-md-6 col-md-offset-3 -->

			<!-- 3.- Sección de Teléfonos -->
			<div class="col-md-4">
				<section class="mainHeader__metadata colorPurple text-xs-center">
					<h2 class="text-uppercase"> <?php _e("Pedidos" , LANG ); ?></h2>
					<!-- Números -->
					<i class="fa fa-phone" aria-hidden="true"></i>
					<?php 
						if( isset($options['theme_phone_text']) ) :
							#telefonos 
							$phones =  $options['theme_phone_text'];
							#variable de control
							$control = 0;
							foreach( $phones as $phone ) :
								$separator = $control === count($phones) - 1 ? "" : " - ";
								echo $phone . $separator;
							$control++; endforeach;
						endif;
					?>
				</section> <!-- /.mainHeader__metadata -->
			</div> <!-- /.col-md-4 -->

		</div> <!-- /.row -->

	</section> <!-- /.pageWrapperLayout -->

	<!-- Navegación Principal -->
	<nav class="mainNavigation bgPurple text-uppercase text-xs-center">
		<div class="pageWrapperLayout">
			<!-- Menu de Navegacion Izquierda -->
			<?php wp_nav_menu(
				array(
					'menu_class'     => 'main-menu',
					'theme_location' => 'main-menu'
				));
			?>
		</div> <!-- /.pageWrapperLayout -->
	</nav>

</header> <!-- /.mainHeader  -->



