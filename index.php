<?php
/**
 * Plugin Name: Sidelines data
 * Plugin URI: https://github.com/royeyal/sidelines-trial
 * Description: Use the Sidelines block to retrieve article data.
 * Version: 1.0.0
 * Author: Roy Eyal
 * Author URI: https://royeyal.com
 *
 * @package sidelines-examples
 */

function sidelines_examples_dynamic_block_block_init() {

	register_block_type(
		plugin_dir_path( __FILE__ ) . 'build',
		array(
			'render_callback' => 'sidelines_examples_dynamic_block_render_callback',
		)
	);
}
add_action( 'init', 'sidelines_examples_dynamic_block_block_init' );


/**
 * This function is called when the block is being rendered on the front end of the site
 *
 * @param array    $attributes     The array of attributes for this block.
 * @param string   $content        Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents the block being rendered.
 */
function sidelines_examples_dynamic_block_render_callback( $attributes, $content, $block_instance ) {
	ob_start();
	/**
	 * Keeping the markup to be returned in a separate file is sometimes better, especially if there is very complicated markup.
	 * All of passed parameters are still accessible in the file.
	 */
	require plugin_dir_path( __FILE__ ) . 'build/template.php';
	return ob_get_clean();
}