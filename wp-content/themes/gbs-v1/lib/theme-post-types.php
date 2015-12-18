<?php 

// custom post types

function codex_custom_init() {

	$labels_team = array(
		'name'               => 'Team',
		'singular_name'      => 'Team Member',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Team Member',
		'edit_item'          => 'Edit Team Member',
		'new_item'           => 'New Team Member',
		'all_items'          => 'All Team Members',
		'view_item'          => 'View Team Member',
		'search_items'       => 'Search Team',
		'not_found'          => 'No Team Members found',
		'not_found_in_trash' => 'No Team Members found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Team'
		);

	$labels_port = array(
		'name'               => 'Portfolio',
		'singular_name'      => 'Portfolio Items',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Portfolio Item',
		'edit_item'          => 'Edit Portfolio Item',
		'new_item'           => 'New Portfolio Item',
		'all_items'          => 'All Portfolio Items',
		'view_item'          => 'View Portfolio Items',
		'search_items'       => 'Search Portfolio Items',
		'not_found'          => 'No Portfolio Items found',
		'not_found_in_trash' => 'No Portfolio Items found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Portfolio'
		);

	$labels_news = array(
		'name'               => 'News',
		'singular_name'      => 'News Article',
		'add_new'            => 'Add New Article',
		'add_new_item'       => 'Add New Article',
		'edit_item'          => 'Edit Article',
		'new_item'           => 'New Article',
		'all_items'          => 'All Articles',
		'view_item'          => 'View Articles',
		'search_items'       => 'Search Articles',
		'not_found'          => 'No Articles found',
		'not_found_in_trash' => 'No Articles found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'News'
		);

	$args_teams = array(
		'labels'             => $labels_team,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'team' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);

	$args_port = array(
		'labels'             => $labels_port,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' )
		);

	$args_news = array(
		'labels'             => $labels_news,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);

	//register_post_type( 'team', $args_teams );
	register_post_type( 'team', $args_teams );
	register_post_type( 'portfolio', $args_port );
	register_post_type( 'news', $args_news );

	register_taxonomy(
		'market-sectors',
		'portfolio',
		array(
		'hierarchical' => true,
		'label' => 'Market Sectors',
		'query_var' => true,
		'rewrite' => array('slug' => 'market-sectors')
		)
	);
	register_taxonomy(
		'market-services',
		'portfolio',
		array(
		'hierarchical' => true,
		'label' => 'Market Services',
		'query_var' => true,
		'rewrite' => array('slug' => 'market-services')
		)
	);

	add_filter( 'manage_taxonomies_for_portfolio_columns', 'portfolio_type_columns' );

	function portfolio_type_columns( $taxonomies ) {
	    $taxonomies = ['market-sectors','market-services'];
	    return $taxonomies;
	}/**/

// remove columns that we don't need
	function my_manage_columns( $columns ) {
		unset(
			//$columns['author'],
			$columns['comments'],
			$columns['date']
		);
		return $columns;
	}

	add_filter('manage_posts_columns','my_manage_columns');

}
add_action( 'init', 'codex_custom_init' );



?>