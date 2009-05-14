<?php

	// no pagination for single posts or pages
	//
	if(is_single()||is_page()) {
		return true;
		}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	// parse parameters
	//
	parse_str($query, $args);
	$args = array_merge(
		array(
			'first_last' => 0,
				'first' => '&laquo; &#1085;&#1072;&#1095;&#1072;&#1083;&#1086;',
				'last' => '&#1082;&#1088;&#1072;&#1081; &raquo;',
			'prev_next' => 1,
				'prev' => '&lsaquo; &#1085;&#1072;&#1079;&#1072;&#1076;',
				'next' => '&#1085;&#1072;&#1087;&#1088;&#1077;&#1076; &rsaquo;',
			'additional' => 2,
			),
		$args
		);

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	global $wpdb;
	global $request, $posts_per_page, $paged;

	// compose query
	//
	if (!preg_match('{FROM\s(.*)\sLIMIT}siU', $request, $R)) {
		return true;
		}

	if(is_tag() || is_category){
		$R[1] = str_replace(
			"GROUP BY {$wpdb->posts}.ID",
			'', $R[1]
			);
		}

	$sql = "SELECT Count(*) FROM {$R[1]}";

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	// get total number of pages
	//
	$total_pages = $wpdb->get_var($sql);
	$limit = $posts_per_page;
	
	// page offset ?
	//
	$page = !empty($paged) ? $paged : 1;
	$start = $page
		? ($page - 1) * $limit
		: 0;

	// calculate the offsets
	//
	$page = ($page == 0) ? 1 : $page;
	$first_page = 1;
	$prev_page = $page - 1;
	$next_page = $page + 1;
	$last_page = ceil($total_pages / $limit);
	$pre_last_page = $last_page - 1;

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 
	
	if($last_page > 1) {
		
		echo '<div class="pagination">';

		// first ?
		//
		if ($args['first_last']) {
			
			if($page > 1) {
				echo '<a class="pag-first" href="' , get_pagenum_link(1) , '">', $args['first'], '</a>';
				} else {
				echo '<a class="pag-first disabled" >', $args['first'], '</a>';
				}
			}

		// previous ?
		//
		if ($args['prev_next']) {
			
			if($page > 1) {
				echo '<a class="pag-prev" href="' , get_pagenum_link($prev_page) , '">', $args['prev'], '</a>';
				} else {
				echo '<a class="pag-prev disabled" >', $args['prev'], '</a>';
				}
			}
		
	
		// pages	
		//
		echo '<span class="pages">';
		
		// not enough pages to bother breaking it up
		//
		if ($last_page < 7 + ($args['additional'] * 2)){

			for ($counter = 1; $counter <= $last_page; $counter++) {
				if ($counter == $page) {
					echo '<a href="' , get_pagenum_link($counter) , '" class="selected">', $counter, '</a>';
					} else {
					echo '<a href="' , get_pagenum_link($counter) , '">', $counter, '</a>';
					}
				}
			} else

		// enough pages to hide some
		//
		if($last_page > 5 + ($args['additional'] * 2)){
			
			// close to beginning; only hide later pages
			//
			if($page < 1 + ($args['additional'] * 2)){
				
				for ($counter = 1; $counter < 4 + ($args['additional'] * 2); $counter++){
					if ($counter == $page) {
						echo '<a href="' , get_pagenum_link($counter) , '" class="selected">', $counter, '</a>';
						} else {
						echo '<a href="' , get_pagenum_link($counter) , '">', $counter, '</a>';
						}
					}
				
				echo '<span class="island">...</span>';
				echo '<a href="' , get_pagenum_link($pre_last_page) , '">', $pre_last_page, '</a>';
				echo '<a href="' , get_pagenum_link($last_page) , '">', $last_page, '</a>';
				} else
					
			// in middle; hide some front and some back
			//
			if($last_page - ($args['additional'] * 2) > $page && $page > ($args['additional'] * 2)){
				
				echo '<a href="' , get_pagenum_link(1) , '">', 1, '</a>';
				echo '<a href="' , get_pagenum_link(2) , '">', 2, '</a>';
				echo '<span class="island">...</span>';
				
				for ($counter = $page - $args['additional']; $counter <= $page + $args['additional']; $counter++) {
					if ($counter == $page) {
						echo '<a href="' , get_pagenum_link($counter) , '" class="selected">', $counter, '</a>';
						} else {
						echo '<a href="' , get_pagenum_link($counter) , '">', $counter, '</a>';
						}
					}
				
				echo '<span class="island">...</span>';
				echo '<a href="' , get_pagenum_link($pre_last_page) , '">', $pre_last_page, '</a>';
				echo '<a href="' , get_pagenum_link($last_page) , '">', $last_page, '</a>';
				}

			// close to end; only hide early pages
			//
			else {
				echo '<a href="' , get_pagenum_link(1) , '">', 1, '</a>';
				echo '<a href="' , get_pagenum_link(2) , '">', 2, '</a>';
				echo '<span class="island">...</span>';
				
				for ($counter = $last_page - (2 + ($args['additional'] * 2)); $counter <= $last_page; $counter++) {
					if ($counter == $page) {
						echo '<a href="' , get_pagenum_link($counter) , '" class="selected">', $counter, '</a>';
						} else {
						echo '<a href="' , get_pagenum_link($counter) , '">', $counter, '</a>';
						}
					}
				}
			}
		echo '</span>';

		// next ?
		//
		if ($args['prev_next']) {
			
			if ($page < $counter - 1) {
				echo '<a class="pag-next" href="' , get_pagenum_link($next_page) , '">', $args['next'], '</a>';
				} else {
				echo '<a class="pag-next disabled" >', $args['next'], '</a>';
				}
			}

		// last ?
		//
		if ($args['first_last']) {
			
			if($page != $last_page) {
				echo '<a class="pag-last" href="' , get_pagenum_link($last_page) , '">', $args['last'], '</a>';
				} else {
				echo '<a class="pag-last disabled" >', $args['last'], '</a>';
				}
			}

		echo '</div>'. "\n";
		} else {
		echo '<hr />';
		}