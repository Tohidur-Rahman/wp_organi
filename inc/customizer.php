<?php
/**
 * Organi Theme Customizer
 *
 * @package Organi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function organi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'organi_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'organi_customize_partial_blogdescription',
			)
		);
		
		}
        



        // The following settings should be hidden if the theme is 
			
		
		$wp_customize->add_setting(
			'products_per_row',
			array(
				'default'              => 3,
				'sanitize_callback'    => 'absint',
				'sanitize_js_callback' => 'absint',
			)
		);
		
		$wp_customize->add_control(
			'products_per_row',
			array(
				'label'       => __( 'Products per row', 'woocommerce' ),
				'description' => __( 'How many products should be shown per row?', 'woocommerce' ),
				'section'     => 'woocommerce_product_catalog',
				'settings'    => 'products_per_row',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => wc_get_theme_support( 'product_grid::min_columns', 1 ),
					'max'  => wc_get_theme_support( 'product_grid::max_columns', '' ),
					'step' => 1,
				),
			)
		);
	
		
		// Only add this setting if something else isn't managing the number of products per page.
			$wp_customize->add_setting(
				'woocommerce_catalog_rows',
				array(
					'default'              => 4,
					'type'                 => 'option',
					'capability'           => 'manage_woocommerce',
					'sanitize_callback'    => 'absint',
					'sanitize_js_callback' => 'absint',
				)
			);
		
		
		$wp_customize->add_control(
			'woocommerce_catalog_rows',
			array(
				'label'       => __( 'Rows per page', 'woocommerce' ),
				'description' => __( 'How many rows of products should be shown per page?', 'woocommerce' ),
				'section'     => 'woocommerce_product_catalog',
				'settings'    => 'woocommerce_catalog_rows',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => wc_get_theme_support( 'product_grid::min_rows', 1 ),
					'max'  => wc_get_theme_support( 'product_grid::max_rows', '' ),
					'step' => 1,
				),
			)
		);
	}

add_action( 'customize_register', 'organi_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function organi_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function organi_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function organi_customize_preview_js() {
	wp_enqueue_script( 'organi-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'organi_customize_preview_js' );



