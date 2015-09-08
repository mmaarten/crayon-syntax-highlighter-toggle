<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
------------------------------------------------------------------------------------------------------------------------
Plugin Name: Crayon Syntax Highlighter Toggle
Plugin URI:  http://maartenmenten.be
Description: Abilty to expand/collapse code
Version:     1.0.0
Author:      Maarten Menten
Author URI:  http://maartenmenten.be
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
------------------------------------------------------------------------------------------------------------------------
*/

define( 'MM_CRAYON_FILE', __FILE__ );

class MM_Crayon_Toggle
{
	protected $options = array();

	public function __construct()
	{
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function init()
	{
		$this->options = apply_filters( 'mm_crayon_toggle', array
		(
			'max_lines'     => 10,
			'collapse_text' => __( 'Collapse' ),
			'expand_text'   => __( 'Expand' )
		));
	}

	public function enqueue_scripts()
	{
		wp_enqueue_style( 'mm-caryon-toggle', plugins_url( 'css/main.css', MM_CRAYON_FILE ) );
		wp_enqueue_script( 'mm-caryon-toggle', plugins_url( 'js/main.js', MM_CRAYON_FILE ), array( 'jquery' ), false, true );

		wp_localize_script( 'mm-caryon-toggle', 'MM_Crayon_Toggle', $this->options );
	}
}

$MM_Crayon_Toggle = new MM_Crayon_Toggle();

?>