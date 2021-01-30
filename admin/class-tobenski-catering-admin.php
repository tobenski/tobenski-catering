<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/tobenski/
 * @since      1.0.0
 *
 * @package    Tobenski_Catering
 * @subpackage Tobenski_Catering/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tobenski_Catering
 * @subpackage Tobenski_Catering/admin
 * @author     Knud Rishøj <tirdyr@tobenski.dk>
 */
class Tobenski_Catering_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the Menu CPT
	 *
	 * @since 1.0.0
	 */
	public function register_cpt()
	{
		/**
		 * Post Type: Catering Menuer.
		 */

		$labels = [
			"name" => __("Catering Menuer", "Tobenski"),
			"singular_name" => __("Catering Menu", "Tobenski"),
			"menu_name" => __("Catering", "Tobenski"),
			"all_items" => __("Alle Catering Menuer", "Tobenski"),
			"add_new" => __("Tilføj Ny", "Tobenski"),
			"add_new_item" => __("Tilføj Ny Catering Menu", "Tobenski"),
			"edit_item" => __("Edit Catering Menu", "Tobenski"),
			"new_item" => __("New Catering Menu", "Tobenski"),
			"view_item" => __("View Catering Menu", "Tobenski"),
			"view_items" => __("View Catering Menuer", "Tobenski"),
			"search_items" => __("Search Catering Menuer", "Tobenski"),
			"not_found" => __("No Catering Menuer found", "Tobenski"),
			"not_found_in_trash" => __("No Catering Menuer found in trash", "Tobenski"),
			"parent" => __("Parent Catering Menu:", "Tobenski"),
			"featured_image" => __("Featured image for this Catering Menu", "Tobenski"),
			"set_featured_image" => __("Set featured image for this Catering Menu", "Tobenski"),
			"remove_featured_image" => __("Remove featured image for this Catering Menu", "Tobenski"),
			"use_featured_image" => __("Use as featured image for this Catering Menu", "Tobenski"),
			"archives" => __("Catering Menu archives", "Tobenski"),
			"insert_into_item" => __("Insert into Catering Menu", "Tobenski"),
			"uploaded_to_this_item" => __("Upload to this Catering Menu", "Tobenski"),
			"filter_items_list" => __("Filter Catering Menuer list", "Tobenski"),
			"items_list_navigation" => __("Catering Menuer list navigation", "Tobenski"),
			"items_list" => __("Catering Menuer list", "Tobenski"),
			"attributes" => __("Catering Menuer attributes", "Tobenski"),
			"name_admin_bar" => __("Catering Menu", "Tobenski"),
			"item_published" => __("Catering Menu published", "Tobenski"),
			"item_published_privately" => __("Catering Menu published privately.", "Tobenski"),
			"item_reverted_to_draft" => __("Catering Menu reverted to draft.", "Tobenski"),
			"item_scheduled" => __("Catering Menu scheduled", "Tobenski"),
			"item_updated" => __("Catering Menu updated.", "Tobenski"),
			"parent_item_colon" => __("Parent Catering Menu:", "Tobenski"),
		];

		$args = [
			"label" => __("Catering Menu", "Tobenski"),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"map_meta_cap" => true,
			"hierarchical" => true,
			"rewrite" => [ "slug" => "catering", "with_front" => true ],
			"query_var" => true,
			"menu_position" => 22,
			"supports" => [ "title", "thumbnail", "editor", "page-attributes" ],
			"taxonomies" => [ "catering_type" ],
		];

		register_post_type("catering", $args);
	}

	/**
	 * Register the Menu Custom Fields
	 *
	 * @since 1.0.0
	 */
	public function register_custom_fields()
	{
		acf_add_local_field_group(
            array(
            'key' => 'group_tob_01yrasi5v7',
            'title' => 'Catering menuer',
            'fields' => array(
                array(
                    'key' => 'field_tob_co2cg0zrb0',
                    'label' => 'Menu Content',
                    'name' => 'menu_content',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'delay' => 0,
                ),
                array(
                    'key' => 'field_tob_4kph4s7gtc',
                    'label' => 'Pris',
                    'name' => 'pris',
                    'type' => 'number',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 199,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_tob_kj0spyh0am',
                    'label' => 'Minimum kuverter',
                    'name' => 'kuverter',
                    'type' => 'number',
                    'instructions' => 'Minimum antal kuverter.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '10',
                    'placeholder' => 'Minimum kuverter',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_vufdrlu8ro',
                    'label' => 'Min. bestillings tid',
                    'name' => 'min_order_time',
                    'type' => 'number',
                    'instructions' => 'Hvor mange dage i forvejen skal menuen/typen bestilles.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 7,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_tob_flz6vz6gmy',
                    'label' => 'Anretnings beskrivelse',
                    'name' => 'short_description',
                    'type' => 'text',
                    'instructions' => 'Meget kort beskrivelse af hvordan maden kommer ud.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Maden er varm, anrettet og klar til servering.',
                    'placeholder' => 'Maden er varm, anrettet og klar til servering.',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '75',
                ),
                array(
                    'key' => 'field_tob_778z0vb441',
                    'label' => 'Catering Secondary Image',
                    'name' => 'catering_secondary_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'catering',
                    ),
                ),
            ),
            'menu_order' => 1,
            'position' => 'normal',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
            'description' => '',
            )
		);
		
		acf_add_local_field_group(array(
            'key' => 'group_tob_6o3brta8sv',
            'title' => 'sticky',
            'fields' => array(
                array(
                    'key' => 'field_tob_x3b0xzx52d',
                    'label' => 'sticky',
                    'name' => 'sticky',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => 'Sticky',
                    'ui_off_text' => 'Not Sticky',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'catering',
                    ),
                ),
            ),
            'menu_order' => 5,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
		));
		
		acf_add_local_field_group(array(
            'key' => 'group_tob_t7c1k5m5d9',
            'title' => 'CTA',
            'fields' => array(
                array(
                    'key' => 'field_tob_0v55grvk6v',
                    'label' => 'CTA Tekst',
                    'name' => 'cta_tekst',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Kom og køb',
                    'placeholder' => 'Tekst til CTA',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_1wtbr2rpp0',
                    'label' => 'CTA Link',
                    'name' => 'cta_link',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '/',
                    'placeholder' => 'CTA destination',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_ilkhv8n3lh',
                    'label' => 'CTA Buttton Text',
                    'name' => 'cta_buttton_text',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Tryk her',
                    'placeholder' => 'CTA button text',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
     				array(
						'param' => 'page',
						'operator' => '==',
						'value' => get_page_by_path( '/catering/', OBJECT, 'page' )->ID,
					),
				),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'catering',
                    ),
				),
            ),
            'menu_order' => 0,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
	}

	/**	
	 * Register the Menu_Type Taxonomy
	 * 
	 * Might not be used.
	 * 
	 * @since 1.0.0
	 */
	public function register_taxonomy() 
	{
		/**
		 * Taxonomy: Catering Typer.
		 */

		$labels = [
			"name" => __("Catering Typer", "Tobenski"),
			"singular_name" => __("catering type", "Tobenski"),
			"menu_name" => __("Catering Typer", "Tobenski"),
			"all_items" => __("All Catering Typer", "Tobenski"),
			"edit_item" => __("Edit catering type", "Tobenski"),
			"view_item" => __("View catering type", "Tobenski"),
			"update_item" => __("Update catering type name", "Tobenski"),
			"add_new_item" => __("Add new catering type", "Tobenski"),
			"new_item_name" => __("New catering type name", "Tobenski"),
			"parent_item" => __("Parent catering type", "Tobenski"),
			"parent_item_colon" => __("Parent catering type:", "Tobenski"),
			"search_items" => __("Search Catering Typer", "Tobenski"),
			"popular_items" => __("Popular Catering Typer", "Tobenski"),
			"separate_items_with_commas" => __("Separate Catering Typer with commas", "Tobenski"),
			"add_or_remove_items" => __("Add or remove Catering Typer", "Tobenski"),
			"choose_from_most_used" => __("Choose from the most used Catering Typer", "Tobenski"),
			"not_found" => __("No Catering Typer found", "Tobenski"),
			"no_terms" => __("No Catering Typer", "Tobenski"),
			"items_list_navigation" => __("Catering Typer list navigation", "Tobenski"),
			"items_list" => __("Catering Typer list", "Tobenski"),
		];

		$args = [
			"label" => __("Catering Typer", "Tobenski"),
			"labels" => $labels,
			"public" => true,
			"publicly_queryable" => true,
			"hierarchical" => false,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => [ 'slug' => 'catering_type', 'with_front' => true, ],
			"show_admin_column" => true,
			"show_in_rest" => true,
			"rest_base" => "catering_type",
			"rest_controller_class" => "WP_REST_Terms_Controller",
			"show_in_quick_edit" => true,
				];
		register_taxonomy("catering_type", [ "catering" ], $args);
	}

	

}
