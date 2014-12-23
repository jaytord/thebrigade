<?php
	
	add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

	function bones_flush_rewrite_rules() {
		flush_rewrite_rules();
	}

	/*=============================================
	======== PROJECTS =============================
	==============================================*/

	function create_projects_type() { 
		// creating (registering) the custom type 
		register_post_type( 'project', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 'labels' => array(
				'name' => __( 'Projects', 'bonestheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Project', 'bonestheme' ), /* This is the individual type */
				'all_items' => __( 'All Projects', 'bonestheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Project', 'bonestheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Projects', 'bonestheme' ), /* Edit Display Title */
				'new_item' => __( 'New Project', 'bonestheme' ), /* New Display Title */
				'view_item' => __( 'View Project', 'bonestheme' ), /* View Display Title */
				'search_items' => __( 'Search Projects', 'bonestheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'This is the projects post type', 'bonestheme' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
				'rewrite'	=> array( 'slug' => 'project', 'with_front' => false ), /* you can specify its url slug */
				'has_archive' => 'project', /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
			) /* end of options */
		); /* end of register post type */
	}

	add_action( 'init', 'create_projects_type');
	
	register_taxonomy( 'project_cat', 
		array('project'), /* if you change the name of register_post_type( 'project_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Project Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Project Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Project Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Project Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Project Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Project Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Project Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Project Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Project Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Project Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'project_cat' ),
		)
	);
	
	register_taxonomy( 'project_tag', 
		array('project'), /* if you change the name of register_post_type( 'project_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Project Tags', 'bonestheme' ), /* name of the Project taxonomy */
				'singular_name' => __( 'Project Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Project Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Project Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Project Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Project Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Project Tag', 'bonestheme' ), /* edit Project taxonomy title */
				'update_item' => __( 'Update Project Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Project Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Project Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true
		)
	);

	/*=============================================
	======== SPECIALISTS ==========================
	==============================================*/

	function create_specialist_type() { 
		// creating (registering) the custom type 
		register_post_type( 'specialist', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 'labels' => array(
				'name' => __( 'Specialists', 'bonestheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Specialist', 'bonestheme' ), /* This is the individual type */
				'all_items' => __( 'All Specialists', 'bonestheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Specialist', 'bonestheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Specialists', 'bonestheme' ), /* Edit Display Title */
				'new_item' => __( 'New Specialist', 'bonestheme' ), /* New Display Title */
				'view_item' => __( 'View Specialist', 'bonestheme' ), /* View Display Title */
				'search_items' => __( 'Search Specialists', 'bonestheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'This is the specialist post type', 'bonestheme' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
				'rewrite'	=> array( 'slug' => 'specialist', 'with_front' => false ), /* you can specify its url slug */
				'has_archive' => 'specialist', /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
			) /* end of options */
		); /* end of register post type */
	}

	add_action( 'init', 'create_specialist_type');
	
	register_taxonomy( 'specialist_cat', 
		array('specialist'), /* if you change the name of register_post_type( 'project_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Specialist Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Specialist Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Specialist Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Specialist Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Specialist Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Specialist Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Specialist Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Specialist Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Specialist Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Specialist Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'specialist_cat' ),
		)
	);
	
	register_taxonomy( 'specialist_tag', 
		array('specialist'), /* if you change the name of register_post_type( 'project_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Specialist Tags', 'bonestheme' ), /* name of the Project taxonomy */
				'singular_name' => __( 'Specialist Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Specialist Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Specialist Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Specialist Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Specialist Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Specialist Tag', 'bonestheme' ), /* edit Specialist taxonomy title */
				'update_item' => __( 'Update Specialist Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Specialist Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Specialist Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true
		)
	);

	/*=============================================
	======== CONTACTS =============================
	==============================================*/

	function create_contact_type() { 
		// creating (registering) the custom type 
		register_post_type( 'contact', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 'labels' => array(
				'name' => __( 'Contacts', 'bonestheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Contact', 'bonestheme' ), /* This is the individual type */
				'all_items' => __( 'All Contacts', 'bonestheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Contact', 'bonestheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Contacts', 'bonestheme' ), /* Edit Display Title */
				'new_item' => __( 'New Contact', 'bonestheme' ), /* New Display Title */
				'view_item' => __( 'View Contact', 'bonestheme' ), /* View Display Title */
				'search_items' => __( 'Search Contacts', 'bonestheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'This is the contact post type', 'bonestheme' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
				'rewrite'	=> array( 'slug' => 'contact', 'with_front' => false ), /* you can specify its url slug */
				'has_archive' => 'contact', /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
			) /* end of options */
		); /* end of register post type */
	}

	add_action( 'init', 'create_contact_type');
	
	register_taxonomy( 'contact_cat', 
		array('contact'), /* if you change the name of register_post_type( 'project_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Contact Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Contact Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Contact Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Contact Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Contact Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Contact Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Contact Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Contact Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Contact Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Contact Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'contact_cat' ),
		)
	);
	
	register_taxonomy( 'contact_tag', 
		array('contact'), /* if you change the name of register_post_type( 'project_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Contact Tags', 'bonestheme' ), /* name of the Project taxonomy */
				'singular_name' => __( 'Contact Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Contact Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Contact Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Contact Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Contact Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Contact Tag', 'bonestheme' ), /* edit Contact taxonomy title */
				'update_item' => __( 'Update Contact Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Contact Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Contact Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true
		)
	);
?>
