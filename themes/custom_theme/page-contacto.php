<?php /* Template Name: Página Contact Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">
		
		<div class="row">
			
			<!-- SECCION DE DATOS  -->
			<div class="col-xs-12 col-sm-6">
				
				<!-- datos -->
				<div class="pageContacto__item">

					<!-- Título -->
					<h2 class="text-uppercase colorPurple"> 
						<span> <?= __( "datos" , "LANG" ); ?> </span>
					</h2>

					<!-- Datos -->
					<ul class="pageContacto__data">
						
						<!-- telefono -->
						<li>
							<!-- Icono -->
							<i>
								<img src="<?= IMAGES ?>/icon/iconos_contacto_telefono_plomo.png" alt="iconos_contacto_telefono_plomo" class="img-fluid" />
							</i>
							
							<div class="content-text">
								<p> 
									<?php
										$phones = $options['theme_phone_text'];

										for ( $i = 0 ; $i < count($phones) ; $i++ ) 
										{ 
											#Variable separación
											$split = $i == count($phones) - 1 ? "" : " - ";
											#Mostrar telefonos
											echo $phones[$i] . $split;
										} 
									?> 
								</p>
							</div> <!-- /.content-text -->

						</li>
						
						<!-- celular -->
						<li>
							<!-- Icono -->
							<i>
								<img src="<?= IMAGES ?>/icon/iconos_contacto_rpm.png" alt="iconos_contacto_rpm" class="img-fluid" />

							</i>

							<div class="content-text">
								<?= apply_filters("the_content" , $options['theme_details_numbers'] ); ?>
							</div> <!-- /.content-text -->

						</li>
						
						<!-- email -->
						<li>
							<!-- Icono -->
							<i>
								<img src="<?= IMAGES ?>/icon/iconos_contacto_mail_plomo.png" alt="iconos_contacto_mail_plomo" class="img-fluid" />
							</i>
							
							<div class="content-text">
								<p class="colorPurple"> 
									<?= $options['theme_email_text']; ?>
								</p>
							</div> <!-- /.content-text -->

						</li>
						
						<!-- direccion -->
						<li>
							<!-- Icono -->
							<i>
								<img src="<?= IMAGES ?>/icon/iconos_contacto_direccion_plomo.png" alt="iconos_contacto_direccion_plomo" class="img-fluid" />
							</i>
							
							<div class="content-text">
								<?= apply_filters( "the_content" , $options['theme_address_text'] ); ?>
							</div> <!-- /.content-text -->

						</li>
						
					</ul> <!-- /.pageContacto__data -->

				</div> <!-- /.pageContacto__item -->
				
				<!-- horario de atencion -->
				<div class="pageContacto__item">

					<!-- Título -->
					<h2 class="text-uppercase colorPurple"> 
						<span><?= __( "horario de atención" , "LANG" ); ?> </span> </h2>

					<!-- Contenido -->
					<?php if( isset($options['theme_schedule_attention']) ) : ?>
					<?= apply_filters("the_content" , $options['theme_schedule_attention'] ); ?>
					<?php endif; ?>

				</div> <!-- /.pageContacto__item -->
				
				<!-- redes sociales -->
				<div class="pageContacto__item">

					<!-- Título -->
					<h2 class="text-uppercase colorPurple">
					<span> <?= __( "redes sociales" , "LANG" ); ?> </span></h2>
					
					<!-- Menude redes sociales -->
					<ul class="pageContacto__socialLinks">
						<!-- Facebook -->
						<?php if( isset($options['theme_social_fb_text']) && !empty($options['theme_social_fb_text'] ) ) : ?>
							<li> 
								<a target="_blank" href="<?= $options['theme_social_fb_text']; ?>" class="<?= $variation_class; ?>">
								<!-- Icono --> <i class="fa fa-facebook" aria-hidden="true"></i>
							</a></li>
						<?php endif; ?>

						<!-- Twitter -->
						<?php if( isset($options['theme_social_twitter_text']) && !empty($options['theme_social_twitter_text'] ) ) : ?>
							<li> 
								<a target="_blank" href="<?= $options['theme_social_twitter_text']; ?>" class="<?= $variation_class; ?>">
								<!-- Icono --> <i class="fa fa-twitter" aria-hidden="true"></i>
							</a></li>
						<?php endif; ?>

						<!-- Youtube -->
						<?php if( isset($options['theme_social_youtube_text']) && !empty($options['theme_social_youtube_text'] ) ) : ?>
							<li> 
								<a target="_blank" href="<?= $options['theme_social_youtube_text']; ?>" class="<?= $variation_class; ?>">
								<!-- Icono --> <i class="fa fa-youtube" aria-hidden="true"></i>
							</a></li>
						<?php endif; ?>

					</ul> <!-- /.sectionSocialLinks -->

				</div> <!-- /.pageContacto__item -->
				
			</div> <!-- /.col-xs-12 col-sm-6 -->
			
			<!-- SECCION DE FORMULARIO -->
			<div class="col-xs-12 col-sm-6">

				<!-- formulario-->
				<div class="pageContacto__item">

					<!-- Título -->
					<h2 class="text-uppercase colorPurple"> 
						<span><?= __( "formulario" , "LANG" ); ?> </span>
					</h2>

					<!-- Separación --> <br>

					<!-- Formulario -->
					<form id="form-contacto" action="" class="pageContacto__form" method="POST">

						<!-- Nombre -->
						<div class="pageContacto__form__group">
							<label for="input_name" class="sr-only"></label>
							<input type="text" id="input_name" name="input_name" placeholder="<?php _e( 'Nombre (obligatorio)', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group -->

						<!-- Email -->
						<div class="pageContacto__form__group">
							<label for="input_email" class="sr-only"></label>
							<input type="email" id="input_email" name="input_email" placeholder="<?php _e( 'E-mail (obligatorio)', LANG ); ?>" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido"/>
						</div> <!-- /.pageContacto__form__group -->						

						<!-- Teléfono -->
						<div class="pageContacto__form__group">
							<label for="input_phone" class="sr-only"></label>
							<input type="text" id="input_phone" name="input_phone" placeholder="<?php _e( 'Teléfono (obligatorio)', LANG ); ?>" data-parsley-type='digits' data-parsley-type-message="Solo debe contener números" required="" />
						</div> <!-- /.pageContacto__form__group -->

						<!-- Asunto --> 
						<div class="pageContacto__form__group">
							<label for="input_subject" class="sr-only"></label>
							<input type="text" id="input_subject" name="input_subject" placeholder="<?php _e( 'Asunto', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group --> 

						<!-- Mensaje -->
						<div class="pageContacto__form__group">
							<label for="input_consulta" class="sr-only"></label>
							<textarea name="input_consulta" id="input_consulta" placeholder="<?php _e( 'Mensaje', LANG ); ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
						</div> <!-- /.pageContacto__form__group -->

						<!-- Boton -->
						<button type="submit" id="send-form" class="btnCommon__show-more text-uppercase">
							<?php _e( 'enviar' , LANG ); ?>
						</button>


					</form> <!-- /. -->

				</div> <!-- /.pageContacto__item -->
				
			</div> <!-- /.col-xs-12 col-sm-6 -->

		</div> <!-- /.row -->


		<!-- CONTENIDO DE PAGINA -->
		<section class="pageContacto__item">

			<!-- Título -->
			<h2 class="text-uppercase colorPurple"> 
				<span> <?= __( "distribuidores" , "LANG" ); ?> </span>
			</h2>

			<!-- Espacio -->

			<!-- Contenido -->
			<?= apply_filters( "the_content" , $post->post_content ); ?>
			
		</section> <!-- /.pageContacto__item -->


		<?php 
			/**
			** Incluir Plantilla de Catálogo
			include( locate_template("partials/common/section-catalogo-empresa.php") );
			**/
		?>
		
	</div> <!-- /.pageWrapperLayout -->


<!-- SECCION DE MAPA -->
<?php if( ( isset($options['theme_lat_coord']) and !empty($options['theme_lat_coord']) ) && ( isset($options['theme_long_coord']) and !empty($options['theme_long_coord']) ) ) : ?>
	
	<section class="pageContacto__mapa">
		<div id="canvas-map" class="hidden-xs-up"></div>
	</section>

<?php endif; ?>

</main> <!-- /.pageWrapper -->

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- Scripts Solo para esta plantilla -->
<?php 
	if( ( isset($options['theme_lat_coord']) and !empty($options['theme_lat_coord']) ) && ( isset($options['theme_long_coord']) and !empty($options['theme_long_coord']) ) ) : 

	#Zoom de mapa
	$zoom_mapa = isset( $options['theme_zoom_mapa'] ) && !empty( $options['theme_zoom_mapa'] ) ? $options['theme_zoom_mapa'] : 16;

?>
	<script type="text/javascript">	
		<?php  
			$lat = $options['theme_lat_coord'];
			$lng = $options['theme_long_coord'];
		?>
	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;
	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : <?= $zoom_mapa; ?>,
	      });
	      //infowindow
	      <?php  

	      	if ( isset($options['theme_text_markup_map']) and !empty($options['theme_text_markup_map']) ) :
	      		$contenido_markup = trim( $options['theme_text_markup_map'] );

	      		$contenido_markup = !empty($contenido_markup) ? apply_filters("the_content" , $options['theme_text_markup_map']  ) : get_bloginfo("name");
	      	else:

	      		$contenido_markup = "Aissa Secret";

	      	endif;
	      ?>

	      var contenido_markup = <?= json_encode( $contenido_markup ) ?>;

	      var infowindow  = new google.maps.InfoWindow({
	        content: contenido_markup
	      });
	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";
	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : "<?= IMAGES . '/icon/icon_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }
	    google.maps.event.addDomListener(window, "load", initialize);
	</script>
<?php endif; ?>


<!-- Footer -->
<?php get_footer(); ?>