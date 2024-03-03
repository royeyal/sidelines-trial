<?php
/**
 * Plugin Name: Star Wars Starships
 * Plugin URI: https://github.com/royeyal/Atera-Trial--Star-Wars-Starships
 * Description: Use the Star Wars Starships block to retrieve data from the Star Wars API.
 * Version: 1.1.0
 * Author: Roy Eyal
 * Author URI: https://royeyal.com
 *
 * @package atera-examples
 */

function atera_examples_dynamic_block_block_init() {

	register_block_type(
		plugin_dir_path( __FILE__ ) . 'build',
		array(
			'render_callback' => 'atera_examples_dynamic_block_render_callback',
		)
	);
}
add_action( 'init', 'atera_examples_dynamic_block_block_init' );


/**
 * This function is called when the block is being rendered on the front end of the site
 *
 * @param array    $attributes     The array of attributes for this block.
 * @param string   $content        Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents the block being rendered.
 */
function atera_examples_dynamic_block_render_callback( $attributes, $content, $block_instance ) {
	ob_start();
	/**
	 * Keeping the markup to be returned in a separate file is sometimes better, especially if there is very complicated markup.
	 * All of passed parameters are still accessible in the file.
	 */
	require plugin_dir_path( __FILE__ ) . 'build/template.php';
	return ob_get_clean();
}