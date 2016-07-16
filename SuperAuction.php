<?php 
/*
	Plugin Name: Super Auction
	Plugin URI: https://github.com/devgurjeet/wordpress-auction
	Description: Plugin to host and manage auctions.
	Version: 0.0.1
	Author: Gurjeet singh.
	Author URI: https://github.com/devgurjeet/wordpress-auction
	License:
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SuperAuction {

    //** Constructor **//
    function __construct() {
    	add_action( 'init', array(&$this,'wpdocs_codex_book_init' ));
    	add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'plugin_settings_link' ) );
    }

    function plugin_settings_link($links) {
		$url = get_admin_url() . 'options-general.php';
		$settings_link = '<a href="'.$url.'">' . __( 'Settings', 'textdomain' ) . '</a>';
		array_unshift( $links, $settings_link );

		return $links;
	}

	function wpdocs_codex_book_init() {
	    $labels = array(
	        'name'                  => _x( 'Auctions', 'Post type general name', 'textdomain' ),
	        'singular_name'         => _x( 'Auction', 'Post type singular name', 'textdomain' ),
	        'menu_name'             => _x( 'Auctions', 'Admin Menu text', 'textdomain' ),
	        'name_admin_bar'        => _x( 'Auction', 'Add New on Toolbar', 'textdomain' ),
	        'add_new'               => __( 'Add New', 'textdomain' ),
	        'add_new_item'          => __( 'Add New Auction', 'textdomain' ),
	        'new_item'              => __( 'New Auction', 'textdomain' ),
	        'edit_item'             => __( 'Edit Auction', 'textdomain' ),
	        'view_item'             => __( 'View Auction', 'textdomain' ),
	        'all_items'             => __( 'All Auctions', 'textdomain' ),
	        'search_items'          => __( 'Search Auctions', 'textdomain' ),
	        'parent_item_colon'     => __( 'Parent Auctions:', 'textdomain' ),
	        'not_found'             => __( 'No Auctions found.', 'textdomain' ),
	        'not_found_in_trash'    => __( 'No Auctions found in Trash.', 'textdomain' ),
	        'featured_image'        => _x( 'Auction Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'archives'              => _x( 'Auction archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
	        'insert_into_item'      => _x( 'Insert into Auction', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
	        'uploaded_to_this_item' => _x( 'Uploaded to this Auction', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
	        'filter_items_list'     => _x( 'Filter Auctions list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
	        'items_list_navigation' => _x( 'Auctions list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
	        'items_list'            => _x( 'Auctions list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	    );
	 
	    $args = array(
	        'labels'             => $labels,
	        'public'             => true,
	        'publicly_queryable' => true,
	        'show_ui'            => true,
	        'show_in_menu'       => true,
	        'query_var'          => true,
	        'rewrite'            => array( 'slug' => 'auction' ),
	        'capability_type'    => 'post',
	        'has_archive'        => true,
	        'hierarchical'       => false,
	        'menu_position'      => null,
	        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	    );
	 
	    register_post_type( 'auction', $args );
	}

} /*Class ends here*/

/*  create plugin object. */
$SuperAuction = new SuperAuction;
?>