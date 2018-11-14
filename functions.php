<?php  

/* 
	Simple Things Wordpress Theme
	Copyright (C) 2011-2015 David J. Lodwig. All Rights Reserved.
	Release	1.5

	Web:	http://www.davelodwig.co.uk
	Email:	david.lodwig@davelodwig.co.uk
	
	--------------------------------------------------------------------------------
	Who	When		What
	--------------------------------------------------------------------------------
	djl 	10/06/15	Converted to the new style layouts.
	djl	10/06/15	Added function to add super/sub script to the WYSIWYG editor
	djl	08/07/16	Added image post types as a instrgram replacement.
	--------------------------------------------------------------------------------
	
*/
	
	if ( function_exists( 'add_theme_support' ) ) 
	{
		add_theme_support( 'post-formats', array( 'image' ) );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 200, TRUE );
	}
	
	if ( function_exists( 'add_image_size' ) ) 
	{ 
		add_image_size ( 'post-highlight', 940, 300, TRUE ) ;	# Front Page Highlight Image
		add_image_size ( 'post-banner', 760, 200, TRUE ) ;		# Index Page Image
		add_image_size ( 'post-banner-wide', 940, 200, TRUE ) ;	# Specialist Subject Pages
		add_image_size ( 'post-postcard', 300, 225 ) ;			# Postcard image for bottom of index page / archive list
		add_image_size ( 'post-header', 760 ) ;					# Article Header Image
		add_image_size ( 'post-header-wide', 940 ) ;			# Article Header Wide Image
		add_image_size ( 'side-thumb', 150, 150, TRUE ) ;		# News Post Listing
	}
	
	if ( function_exists ( 'add_editor_style' ) )
	{
		add_editor_style( 'style_post.css' ) ;
	}
	
	# Add the superscript and subscript buttons to the editor
	
	function add_mce_buttons ( $buttons ) 
	{	
		# Add in a core button that's disabled by default
		$buttons[] = 'superscript';
		$buttons[] = 'subscript';

		return $buttons;
	}
	
	if ( function_exists ( 'add_mce_buttons' ) )
	{
		add_filter ( 'mce_buttons_2', 'add_mce_buttons' ) ;
	}
		
	# Add excerpt functionality to pages
	add_action( 'init', 'add_excerpt_page' );
	
	function add_excerpt_page() 
	{
    	add_post_type_support( 'page', 'excerpt' ) ;
	}
	
	# Show the excerpt on protected posts
	
	function show_protected_excerpt( $excerpt ) 
	{
		if ( post_password_required() )
		{
			$post = get_post();
			$excerpt=$post->post_excerpt;
		}
		return $excerpt;
	}
	
	add_filter( 'the_excerpt', 'show_protected_excerpt' );

	function be_exclude_post_formats_from_blog( $query ) 
	{

		if( $query->is_main_query() && $query->is_home() ) 
		{
			$tax_query = array( array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-quote', 'post-format-image' ),
				'operator' => 'NOT IN',
			) );
			
			$query->set( 'tax_query', $tax_query );
		}
	}

	add_action( 'pre_get_posts', 'be_exclude_post_formats_from_blog' );
	
?>
