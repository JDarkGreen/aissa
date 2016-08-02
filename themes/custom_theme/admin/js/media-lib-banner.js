
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

		//CLICK BOTON SUBIR BANNER 
		j("#btn_add_banner").on('click',function(e){
			e.preventDefault();

			var boton_add = j(this);

			var mediaUploader;
			var post_id = j(this).attr('data-id-post');

			if (mediaUploader) { mediaUploader.open(); return; }

			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: 'Escoge Image',
				button: {
					text: 'Escoge Image'
				}, multiple: false 
			}); 

			mediaUploader.on('select', function() {
				attachment = mediaUploader.state().get('selection').first().toJSON();

				var campo_field = j("#input_img_banner_"+post_id);
          		//setea el campo
          		campo_field.val(attachment.url);

          		//mostrar imagen temporal
          		boton_add.html("");
          		boton_add.append("<img src='"+attachment.url+"' alt='banner-page' style='width: 200px; height: 100px; margin: 0 auto;' />");
          	});

        	// Open the uploader dialog
        	mediaUploader.open();

        });

		//ELIMINAR 
		j("#delete_banner").on('click',function(e){
			e.preventDefault();

			var post_id = j(this).attr('data-id-post');

			var campo_field = j("#input_img_banner_"+post_id);
	      	//setea el campo
	      	campo_field.val("-1");
	      	//ocultar imagen
	      	j('.js-link_banner').slideUp();
    	});


		/*************************************************************************
		* SECCIÓN SUBIR IMAGENES (TÉRMINOS DE TAXONOMÍAS , ETC )
		**************************************************************************/
	    if( j(".js-add-custom-img").length ){ 
	    	var btn_add_img_tax = j(".js-add-custom-img");

	    	btn_add_img_tax.on('click', function(e){
	    		//Prevenir accion por defecto
	    		e.preventDefault();

	    		//Referenciarse asi mismo
	    		var this_btn_add_img = j(this);
			
				//var input_img_tax = j(this).attr('data-input');
				var Uploader;

				if ( Uploader) {
					mediaUploader.open(); 
					return; 
				}

				Uploader = wp.media.frames.file_frame = wp.media({
					title: 'Escoge Image',
					button: {
						text: 'Escoge Image'
					}, multiple: false 
				}); 

				Uploader.on('select', function() {
					attachment = Uploader.state().get('selection').first().toJSON();

					//Extraer que tipo de campo es
					// imagen -banner -extra imagen
					var tipo_campo  = this_btn_add_img.attr("data-input");  
					var campo_field = j("#"+tipo_campo);

					console.log(campo_field);
	          		//setea el campo
	          		campo_field.val(attachment.url);

	          		//Agregamos una imagen de vista previa
	          		var vistaPrevia = "<a class='js-add-custom-img'>";
	          		vistaPrevia += "<img src='"+attachment.url+"' style='width:100px; height:100px;' />";
	          		vistaPrevia += "</a>";

	          		//al contenedor de vista previa
	          		this_btn_add_img.parent(".customize-img-container")
	          		.find(".container-preview").html("").html( vistaPrevia );

	          		//cambiar texto de boton
	          		this_btn_add_img.html( "Cambiar Imagen" );

	          	});

	        	// Open the uploader dialog
	        	Uploader.open();
	    	});
	    }

	    /**
	    * Botón Remover Imagen Subida
	    */
	    j(".js-remove-custom-img").on('click',function(e){
	    	//remover funcion por defecto
	    	e.preventDefault(); 
			//Extraer que tipo de campo es
			// imagen -banner -extra imagen
			var tipo_campo  = j(this).attr("data-input");  
			var campo_field = j("#"+tipo_campo);

	    	//Remover el valor actual del campo oculto
	    	campo_field.val("");
	    	//Eliminar la imagen preview 
	    	j(this).parent(".customize-img-container")
	    	.find(".container-preview").html("");
	    	//Cambiar texto de botón de agregado
	    	j(this).parent(".customize-img-container")
	    	.find(".js-add-custom-img").html("Agregar Imagen");
	    });


	    /************************************************************************
	    * SUBIR LA IMAGEN CON UN WIDGET
	    ************************************************************************/
	    /*if( j(".upload-img-btn-widget").length ){ 
	    	j(document).on( "click", ".upload-img-btn-widget", function ( e ){
	    		//Prevenir accion por defecto
	    		e.preventDefault();
	    		//boton
	    		var btn_add_img_tax = j(this);
				
				var Uploader;

				if ( Uploader) { mediaUploader.open();  return; }

				Uploader = wp.media.frames.file_frame = wp.media({
					title: 'Escoge Image',
					button: {
						text: 'Escoge Image'
					}, multiple: false 
				}); 

				Uploader.on('select', function() {
					attachment = Uploader.state().get('selection').first().toJSON();

					var campo_field = btn_add_img_tax.parent("p").find("input");
					console.log(campo_field);
	          		//setea el campo
	          		campo_field.val(attachment.url);
	          	});

	        	// Open the uploader dialog
	        	Uploader.open();
	    	});
	    }	*/    


	/*---------------------------- LIMITE ------------------------------*/
	});

})(jQuery);