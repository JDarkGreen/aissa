
var j = jQuery.noConflict();

(function($){

	//Documento Listo
	j(document).on("ready",function(){

		//Si existe botón de agregar elemento dinámicamente
		if( j(".js-add-element-dynamic").length )
		{

			//Al hacer click
			j(".js-add-element-dynamic").on("click",function( e ){

				//prevenir accion por defecto
				e.preventDefault();

				//Setear variables 

				//boton actual
				$this_button = j(this); 

				//Ultimo elemento que conto - numero + 1
				$last_element_count = parseInt( $this_button.attr("data-last-element") );
				$last_element_count = $last_element_count !== 0 ? $last_element_count + 1 : 0;
				 

				//Elemento padre general
				$parent_container = $this_button.parent("div");

				//Seccion o contenedor donde se encuentran todos los 
				//elementos hijos
				$section_container = $parent_container.find(".js-section-element-dynamic");

				//Html interno a setear
				$stringHtmltoSet = "<label for="+"mb_colors_product["+$last_element_count+"][text]> Nombre de Color: </label>";

				$stringHtmltoSet += "<input type='text' name=mb_colors_product["+$last_element_count+"][text] value='' placeholder='eg. Negro , Rojo' />";

				$stringHtmltoSet += "<br/>";

				$stringHtmltoSet += "<label for="+"mb_colors_product["+$last_element_count+"][color]> Color: </label> <br/>";

				$stringHtmltoSet += "<input type='text' class='js-add-theme-color' name=mb_colors_product["+$last_element_count+"][color] value='' />";


				//Agregar contenido elemento hijo a la seccion contenedora de elementos
				$section_container.append("<p class='child-element-dinamyc'>"+ $stringHtmltoSet +"</p>");

				//Setear último elemento en botón
				$this_button.attr( "data-last-element" , $last_element_count );

			});

		}

		//Para remover elementos 
		if(  j(".js-remove-element-dynamic").length )
		{

			j(document).on( 'click' ,'.js-remove-element-dynamic' , function(){

		    	//Setear elemento padre o contenedor 
		    	$this_button_remove = j(this);

		    	//padre
		    	$container_parent = j(this).parent(".child-element-dinamyc");

		    	//Los inputs setear a null
		    	$container_parent.find("input").val(null);

		    	//remover o esconder
		    	$container_parent.slideUp();


			});

		}


	});

})(jQuery);