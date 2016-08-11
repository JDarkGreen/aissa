<?php  
/**
* Archivo Footer 
**/

#Obtener las opciones de personalización
$options = get_option( 'theme_settings' );

?>	
	<!-- Imagen de Blonda -->
	<div class="mainFooter__image">
		<img src="<?= IMAGES ?>/home/blonda_aissa.png" alt="" class="img-fluid" />
	</div>
	
	<!-- FOOTER -->
	<footer class="mainFooter bgPurple">
		
		<!-- Layout -->
		<div class="pageWrapperLayout">
			
			<!-- Información -->
			<div class="mainFooter__content containerFlex">
				
				<!-- Item Footer -->
				<article class="mainFooter__item text-xs-center">

					<!-- Logo -->
					<h1 class="logo"> Aissa Secret </h1>
					<!-- Link web -->
					<a class="text-web" href="<?= site_url(); ?>"> www.aissa.com.pe </a>


				</article> <!-- /.mainFooter__item-->

				<!-- Item Footer -->
				
				<article class="mainFooter__item">
					<!-- Título -->
					<h4 class="text-uppercase text-xs-center"> visítanos </h4>
					
					<div class="mainFooter__item__content">
						<?php  
							#1.- Extraer Datos Visítanos - Dirección
							if( isset($options['theme_address_text']) && !empty($options['theme_address_text']) ) :
								echo apply_filters( "the_content" , $options['theme_address_text'] );
							endif;
						?>
					</div> <!-- /.mainFooter__item -->
					
				</article> <!-- /.mainFooter__item-->

				<!-- Item Footer -->
				<article class="mainFooter__item">
					<!-- Título -->
					<h4 class="text-uppercase text-xs-center"> comunícate </h4>
					
					<div class="mainFooter__item__content">
						<!-- Menu de datos -->
						<ul class="menuDataList">
						
							<!-- Telefono -->
							<?php if( isset($options['theme_phone_text']) && !empty($options['theme_phone_text']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-phone " aria-hidden="true"></i>
								<p>
								<?php 
									#control 
									$control = 0;
									#teléfonos
									$phones  = $options['theme_phone_text'];
									$phones  = array_filter( $phones );
									#recorrido
									foreach( $phones as $phone ) : 
										#separador
										$separator = $control == count($phones) - 1 ? "" : " - ";
										echo $phone . $separator;
									$control++; endforeach; 
								?>
								<p>
								</li>
							<?php endif; ?>	
											
							<!-- Celular -->
							<?php if( isset($options['theme_cel_text']) && !empty($options['theme_cel_text']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<p>
								<?php 
									#control 
									$control = 0;
									#teléfonos
									$cellphones  = $options['theme_cel_text'];
									$cellphones  = array_filter( $cellphones );
									#recorrido
									foreach( $cellphones as $cellphone ) : 
										#separador
										$separator = $control == count($cellphones) - 1 ? "" : " / ";
										echo $cellphone . $separator;
									$control++; endforeach; 
								?>
								<p>
								</li>
							<?php endif; ?>

							<!-- Email -->
							<?php if( isset($options['theme_email_text']) && !empty($options['theme_email_text']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-envelope" aria-hidden="true"></i>
									<p class="text-green"><?= $options['theme_email_text']; ?> </p>
								</li>
							<?php endif; ?>	
							
						</ul> <!-- /.menuDataList -->

					</div> <!-- /.mainFooter__item__content -->
					
				</article> <!-- /.mainFooter__item-->

				<!-- Item Footer -->
				<article class="mainFooter__item">
					<!-- Título -->
					<h4 class="text-uppercase text-xs-center"> síguenos </h4>
					
					<div class="mainFooter__item__content text-xs-center">

						<!-- Incluir template social -->
						<?php 
						#incluir variación
						$social_variation = "sectionSocialLinks--white";
						include( locate_template("partials/social-network/social-links.php") ); 
						?>

					</div> <!-- /.mainFooter__item__content -->
					
				</article> <!-- /.mainFooter__item-->
				
			</div> <!-- /.mainFooter__content -->

			<!-- Sección desarrollo -->
			<section class="mainFooter__develop text-xs-center">
				<?= "&copy; " . date("Y") . " Ingenioart. Derechos Reservados Design by "; ?>
				<a href="http://www.ingenioart.com/" target="_blank"> INGENIOART </a>
			</section> <!-- /.mainFooter__develop -->
				
		</div> <!-- /.pageWrapperLayout -->

	</footer> <!-- /.mainFooter -->

	<?php wp_footer(); ?>

	<script> var url = "<?= THEMEROOT ?>"; </script>

	<!-- Fin mmenu container -->
	</div> <!-- /. -->

</body>
</html>
