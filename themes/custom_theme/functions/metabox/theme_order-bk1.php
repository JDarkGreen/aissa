		#Conseguir si valor de orden tiene un id
		$args_values = array(
			'meta_key'       => 'mb_sort_elements_select',
			'order'          => 'ASC',
			'orderby'        => 'date', 
			'post_status'    => 'publish',
			'post_type'      => $this_get_post_type,
			'posts_per_page' => 1,
			'meta_value'     => $this_num_order,
			'meta_compare'   => '==',
		);
		$filter_posts   = get_posts( $args_values );
		$id_filter_post = $filter_posts[0]->ID;

		/**
		* Si tienen el mismo id entonces guardar normal sino setear ultimo valor mas 1
		**/

		if ( $post_id === $id_filter_post ) : 
			update_post_meta( $post_id , 'mb_sort_elements_select' , $_POST['mb_sort_elements_select'] );
			#actualizar valor mas 1
		else:
			#es diferente id 
			
			#si el valor es igual al mismo
			if( $this_num_order !== $_POST['mb_sort_elements_select'] ) :
				update_post_meta( $post_id , 'mb_sort_elements_select' , $_POST['mb_sort_elements_select'] );
			else:
				update_post_meta( $post_id , 'mb_sort_elements_select' , $set_order );
			endif; 

		endif;