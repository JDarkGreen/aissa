<?php /** * Plantilla Configuración del Tema **/

/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION REDES SOCIALES

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_social" , __( 'Redes Sociales:' , 'LANG' ), 'custom_settings_section_callback', 'customThemePage' );

function custom_settings_section_callback()
{ 
	echo __( 'Coloca los links de redes sociales correspondientes', 'LANG' );
}

//FACEBOOK
add_settings_field( 'theme_social_fb_text', __( 'Link Facebook', 'LANG' ), 'custom_social_fb_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_fb_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_fb_text]' value='<?= !empty($options['theme_social_fb_text']) ? $options['theme_social_fb_text'] : "" ; ?>'>
	<?php
}

//TWITTER
add_settings_field( 'theme_social_twitter_text', __( 'Link Twitter', 'LANG' ), 'custom_social_tw_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_tw_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_twitter_text]' value='<?= !empty($options['theme_social_twitter_text']) ? $options['theme_social_twitter_text'] : "" ; ?>'>
	<?php
}

//TWITTER
add_settings_field( 'theme_social_youtube_text', __( 'Link Youtube', 'LANG' ), 'custom_social_yt_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_yt_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_youtube_text]' value='<?= !empty($options['theme_social_youtube_text']) ? $options['theme_social_youtube_text'] : "" ; ?>'>
	<?php
}



/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION EMPRESA
**/
/**
* SECCION RUC
**/
add_settings_section( PREFIX."_themePage_section_ruc" , __( 'Personalizar Ruc:' , 'LANG' ), 'custom_settings_section_ruc_callback', 'customThemePageEmpresa' );

function custom_settings_section_ruc_callback()
{ 
	echo __( 'Coloca RUC correspondiente', 'LANG' );
}

//DIRECCIÓN
add_settings_field( 'theme_ruc_text', __( 'Ruc Empresa:', 'LANG' ), 'custom_ruc_render', 'customThemePageEmpresa', PREFIX."_themePage_section_ruc" );
//Renderizado 
function custom_ruc_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_ruc_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_ruc_text']) ? $options['theme_ruc_text'] : "" ; ?> </textarea>
	<?php
}



/**
//TELEFONOS
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_phone" , __( 'Personalizar Teléfonos:' , 'LANG' ), 'custom_settings_section_phone_callback', 'customThemePageEmpresa' );

function custom_settings_section_phone_callback()
{ 
	echo __( 'Coloca los números correspondientes', 'LANG' );
}

//TELEFONOS
add_settings_field( 'theme_phone_text', __( 'Numero Telefono', 'LANG' ), 'custom_phone_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_phone_text][0]' value='<?= !empty($options['theme_phone_text'][0]) ? $options['theme_phone_text'][0] : "" ; ?>'>
	<?php
}

//TELEFONOS
add_settings_field( 'theme_phone_text2', __( 'Numero Telefono 2', 'LANG' ), 'custom_phone2_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_phone_text][1]' value='<?= !empty($options['theme_phone_text'][1]) ? $options['theme_phone_text'][1] : "" ; ?>'>
	<?php
}

//CELULAR
add_settings_field( 'theme_cel_text1', __( 'Numero Celular', 'LANG' ), 'custom_cel_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_cel_text][0]' value='<?= !empty($options['theme_cel_text'][0]) ? $options['theme_cel_text'][0] : "" ; ?>'>
	<?php
}
//CELULAR 2
add_settings_field( 'theme_cel_text2', __( 'Numero Celular 2', 'LANG' ), 'custom_cel2_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_cel_text][1]' value='<?= !empty($options['theme_cel_text'][1]) ? $options['theme_cel_text'][1] : "" ; ?>'>
	<?php
}



/**
* SECCION EMAIL 
**/
add_settings_section( PREFIX."_themePage_section_email" , __( 'Personalizar Email:' , 'LANG' ), 'custom_settings_section_email_callback', 'customThemePageEmpresa' );

function custom_settings_section_email_callback()
{ 
	echo __( 'Coloca email(s) correspondientes', 'LANG' );
}

//EMAIL
add_settings_field( 'theme_email_text', __( 'Email Empresa:', 'LANG' ), 'custom_email_render', 'customThemePageEmpresa', PREFIX."_themePage_section_email" );
//Renderizado 
function custom_email_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' size="50" name='theme_settings[theme_email_text]' value='<?= !empty($options['theme_email_text']) ? $options['theme_email_text'] : "" ; ?>'>
	<?php
}


/**
* SECCION UBICACIÓN
**/
add_settings_section( PREFIX."_themePage_section_address" , __( 'Personalizar Dirección:' , 'LANG' ), 'custom_settings_section_address_callback', 'customThemePageEmpresa' );

function custom_settings_section_address_callback()
{ 
	echo __( 'Coloca dirección correspondiente', 'LANG' );
}

//DIRECCIÓN
add_settings_field( 'theme_address_text', __( 'Dirección Empresa:', 'LANG' ), 'custom_address_render', 'customThemePageEmpresa', PREFIX."_themePage_section_address" );
//Renderizado 
function custom_address_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_address_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_address_text']) ? $options['theme_address_text'] : "" ; ?> </textarea>
	<?php
}



/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION HEADER

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_header" , __( 'Personalizar Información Header:' , 'LANG' ), 'custom_settings_section_header_callback', 'customThemePageHeader' );

function custom_settings_section_header_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//META LOGO
add_settings_field( 'theme_meta_logo_text', __( 'Personalizar Logo', 'LANG' ), 'custom_logo_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_logo_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	
    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_meta_logo_text" class="" name="theme_settings[theme_meta_logo_text]" size="25" value="<?= !empty($options['theme_meta_logo_text']) ? $options['theme_meta_logo_text'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_meta_logo_text']) && !is_null($options['theme_meta_logo_text']) ) : ?>
            <img src="<?= $options['theme_meta_logo_text']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_meta_logo_text" >
            <?php empty($options['theme_meta_logo_text']) || is_null($options['theme_meta_logo_text']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_meta_logo_text">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}

//META SLOGAN
add_settings_field( 'theme_meta_slogan_text', __( 'Slogan en Header', 'LANG' ), 'custom_slogan_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_slogan_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_meta_slogan_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_meta_slogan_text']) ? $options['theme_meta_slogan_text'] : "" ; ?> </textarea>
	<?php
}


//META INFO HEADER
add_settings_field( 'theme_meta_header_text', __( 'Data Información en Header', 'LANG' ), 'custom_header_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_header_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_meta_header_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_meta_header_text']) ? $options['theme_meta_header_text'] : "" ; ?> </textarea>
	<?php
}





/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION NOSOTROS

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_nosotros" , __( 'Personalizar Información Nosotros:' , 'LANG' ), 'custom_settings_section_nosotros_callback', 'customThemePageNosotros' );

function custom_settings_section_nosotros_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//META LOGO
add_settings_field( 'theme_meta_presentacion', __( 'Presentación', 'LANG' ), 'custom_presentacion_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_presentacion_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<textarea name="theme_settings[theme_meta_presentacion]" id="" style="width:500px;height:300px;max-height:300px;"><?= !empty($options['theme_meta_presentacion']) ? $options['theme_meta_presentacion'] : "" ; ?> </textarea>	
		
	<?php
}

//MISION
add_settings_field( 'theme_mision', __( 'Misión Empresa:', 'LANG' ), 'custom_theme_mision_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_mision_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<textarea name="theme_settings[theme_mision]" id="" style="width:500px;height:150px;max-height:150px;"><?= !empty($options['theme_mision']) ? $options['theme_mision'] : "" ; ?> </textarea>	
		
	<?php
}

//VISION
add_settings_field( 'theme_vision', __( 'Visión Empresa:', 'LANG' ), 'custom_theme_vision_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_vision_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<textarea name="theme_settings[theme_vision]" id="" style="width:500px;height:150px;max-height:150px;"><?= !empty($options['theme_vision']) ? $options['theme_vision'] : "" ; ?> </textarea>	
		
	<?php
}





/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* PERSONALIZAR FOOTER

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_footer" , __( 'Personalizar Footer:' , 'LANG' ), 'custom_settings_footer_callback', 'customThemePageFooter' );

function custom_settings_footer_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//TEXTO FOOTER
add_settings_field( 'theme_footer_text', __( 'Presentación', 'LANG' ), 'custom_footer_text_render', 'customThemePageFooter', PREFIX."_themePage_footer" );
//Renderizado 
function custom_footer_text_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<textarea name="theme_settings[theme_footer_text]" id="" style="width:400px;height:100px;max-height:100px;"><?= !empty($options['theme_footer_text']) ? $options['theme_footer_text'] : "" ; ?> </textarea>	
		
	<?php
}

//TEXTO INFORMACIÓN FOOTER
add_settings_field( 'theme_footer_more_info', __( 'Más Información Footer', 'LANG' ), 'custom_footer_more_info_render', 'customThemePageFooter', PREFIX."_themePage_footer" );
//Renderizado 
function custom_footer_more_info_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<textarea name="theme_settings[theme_footer_more_info]" id="" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_footer_more_info']) ? $options['theme_footer_more_info'] : "" ; ?> </textarea>	
		
	<?php
}



/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* PERSONALIZAR CONTACTO MAPA

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_contacto" , __( 'Personalizar Contacto Mapa:' , 'LANG' ), 'custom_settings_contacto_callback', 'customThemePageContactoMapa' );

function custom_settings_contacto_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//LATITUD COORDENADA MAPA
add_settings_field( 'theme_lat_coord', __( 'Latitud:', 'LANG' ), 'custom_latitud_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_latitud_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Digita Coordenada : Latitud" , "LANG" ); ?></p>
	<input type='text' name='theme_settings[theme_lat_coord]' value='<?= !empty($options['theme_lat_coord']) ? $options['theme_lat_coord'] : "" ; ?>' />
	<?php
}


//LONGITUD COORDENADA MAPA
add_settings_field( 'theme_long_coord', __( 'Longitud:', 'LANG' ), 'custom_longitud_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_longitud_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Digita Coordenada : Longitud" , "LANG" ); ?></p>
	<input type='text' name='theme_settings[theme_long_coord]' value='<?= !empty($options['theme_long_coord']) ? $options['theme_long_coord'] : "" ; ?>' />
	<?php
}


//LONGITUD COORDENADA MAPA
add_settings_field( 'theme_zoom_mapa', __( 'Zoom Mapa:', 'LANG' ), 'custom_zoom_map_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_zoom_map_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Zoom Mapa defecto 16" , "LANG" ); ?></p>
	<input type='text' name='theme_settings[theme_zoom_mapa]' value='<?= !empty($options['theme_zoom_mapa']) ? $options['theme_zoom_mapa'] : 16 ; ?>' />
	<?php
}

//Texto Marcador Mapa
add_settings_field( 'theme_text_markup_map', __( 'Texto del Marcador:', 'LANG' ), 'custom_text_markup_map_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_text_markup_map_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Texto del Marcador de Mapa" , "LANG" ); ?></p>

	<textarea name="theme_settings[theme_text_markup_map]" id="" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_text_markup_map']) ? $options['theme_text_markup_map'] : "" ; ?> </textarea>
	<?php
}

//NUMEROS DETALLADOS
add_settings_field( 'theme_details_numbers', __( 'Detalle de Números de Contacto:', 'LANG' ), 'custom_details_numbers_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_details_numbers_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Escribe el texto de todos los números detallados eg. RPC - RPM" , "LANG" ); ?></p>

	<textarea name="theme_settings[theme_details_numbers]" placeholder="eg. RPC: (511) 989037 / 978 988 734 708" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_details_numbers']) ? $options['theme_details_numbers'] : "" ; ?> </textarea>
	<?php
}

//HORARIO DE ATENCIÓN
add_settings_field( 'theme_schedule_attention', __( 'Horario de Atención', 'LANG' ), 'custom_schedule_attention_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );

//Renderizado 
function custom_schedule_attention_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Escribe Horario de Atención" , "LANG" ); ?></p>

	<textarea name="theme_settings[theme_schedule_attention]" placeholder="Lunes a Viernes 10am a 7pm" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_schedule_attention']) ? $options['theme_schedule_attention'] : "" ; ?> </textarea>
	<?php
}


//IMAGEN CONTACTO SECCION
/*add_settings_section( PREFIX."_themePage_contacto_image" , __( 'Personalizar Contacto Imágen:' , 'LANG' ), 'custom_settings_contacto_image_callback', 'customThemePageContactoMapa' );

function custom_settings_contacto_image_callback()
{ 
	echo __( 'Personaliza imágen contacto:', 'LANG' );
}

//AGREGAR CAMPO DE IMAGEN
add_settings_field( 'theme_img_contact', __( 'Imágen Contacto:', 'LANG' ), 'custom_image_contact_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto_image" );
//Renderizado 
function custom_image_contact_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	
    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_img_contact" class="" name="theme_settings[theme_img_contact]" size="25" value="<?= !empty($options['theme_img_contact']) ? $options['theme_img_contact'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_img_contact']) && !is_null($options['theme_img_contact']) ) : ?>
            <img src="<?= $options['theme_img_contact']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_img_contact" >
            <?php empty($options['theme_img_contact']) || is_null($options['theme_img_contact']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_img_contact">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
} */

//MAS INFORMACION CONTACTO
/*add_settings_field( 'theme_contact_more_info', __( 'Información Contacto:', 'LANG' ), 'custom_contact_more_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_contact_more_render() 
{ 
	$options = get_option( 'theme_settings' ); 

	$option_content = array( 
		'dfw'          => true, 
		'editor_height'=> '200' ,
		'textarea_name'=> "theme_settings[theme_contact_more_info]",
	);	
?>
	<p class="description"><?= __( "Información Contacto: " , "LANG" ); ?></p>
<?php
	$text_contact = isset($options['theme_contact_more_info']) ? $options['theme_contact_more_info'] : "";

	wp_editor( htmlspecialchars_decode( $text_contact ), 'theme_contact_more_info' , $option_content );
}*/



//SECCIÓN CUSTOM URL
add_settings_section( PREFIX."_themePage_rewriteurl" , __( 'Personalizar Url:' , 'LANG' ), 'custom_settings_rewrite_url_callback', 'customThemeRewriteUrl' );

function custom_settings_rewrite_url_callback()
{ 
	echo __( 'Personaliza Url de Taxonomías:', 'LANG' );
}

//SECCIÓN DE SOBREESCRIBIR SLUG TAXONOMÍAS

add_settings_field( 'theme_rewriteurl', __( 'Customizar Url:', 'LANG' ), 'theme_rewriteurl_render', 'customThemeRewriteUrl', PREFIX."_themePage_rewriteurl" );
//Renderizado 
function theme_rewriteurl_render() 
{ 
	$options        = get_option( 'theme_settings' ); 
	#todas las taxonomias
	$all_taxonomies = get_taxonomies();
	#excluir taxonomias
	$exclude_tax    =  array("category","post_tag","nav_menu","link_category","post_format","wpmf-category");
	#solo quedar con las taxonomias necesarias
	$all_taxonomies = array_diff( $all_taxonomies , $exclude_tax );
?>
	<h3> TAXONOMÍAS PERSONALIZADAS </h3>

	<table>
		<?php foreach( $all_taxonomies as $tax ) : 
			#var_dump( get_taxonomy( $tax ) );
		?>
		<tr>
			<td> <label><b> <?= $tax ?> </b></label> </td>
			<td> 
				<input type='text' name='theme_settings[theme_rewriteurl][<?= $tax ?>]' value='<?= !empty($options['theme_rewriteurl'][$tax]) ? $options['theme_rewriteurl'][$tax] : $tax; ?>'>
			</td>
		</tr>
		<?php endforeach; ?>
	</table> 

	<h3> TIPOS DE POSTS </h3>

	<?php 
		#Obtener todos los custom post type
		$args = array(
			'public'   => true,
			'_builtin' => false
		);
			
		$output     = 'names'; // names or objects, note names is the default
		$operator   = 'and'; // 'and' or 'or'
		#Todos los tipos de posts
		$custom_post_types = get_post_types( $args, $output, $operator );
	?>

	<table>
		<?php foreach( $custom_post_types as $post_type ) : 
			#var_dump( get_taxonomy( $tax ) );
		?>
		<tr>
			<td> <label><b> <?= $post_type ?> </b></label> </td>
			<td> 
				<input type='text' name='theme_settings[theme_rewriteurl][<?= $post_type ?>]' value='<?= !empty($options['theme_rewriteurl'][$post_type]) ? $options['theme_rewriteurl'][$post_type] : $post_type; ?>'>
			</td>
		</tr>
		<?php endforeach; ?>
	</table> 

<?php
	

}