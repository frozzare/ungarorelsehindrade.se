<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Unit tests to check so Page Tyep Builder is loaded correctly.
 *
 * @package Papi
 */
class WP_Example_Test extends WP_UnitTestCase {

	/**
	 * Test so Papi plugin is loaded correct.
	 */

	public function test_plugin_activated() {
		$this->assertTrue( ! empty( get_template_directory_uri() ) );
	}

}
