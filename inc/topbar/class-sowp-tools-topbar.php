<?php

class Sowp_Tools_Topbar {

	private static $_instance;

	function init() {
		add_action( 'sowp_tools_toolbar_update_file', [ __CLASS__, 'update_files' ] );
		register_deactivation_hook( SOWP_TOOLS_PLUGIN_FILE, [ __CLASS__, 'unschedule_event' ] );

		add_action( 'init', [ $this, 'enqueue_style' ] );
		$this->schedule_event();
	}

	function enqueue_style() {
		if ( file_exists( SOWP_TOOLS_ABSPATH . '/cache/topbar/default.css' ) ) {
			wp_enqueue_style( 'sowp-tools-topbar', plugins_url( 'sowp-tools/cache/topbar/default.css' ) );
		}else {
			wp_enqueue_style( 'sowp-tools-topbar', plugins_url( 'sowp-tools/views/topbar/default.css' ) );
		}

	}

	static function update_files() {
		self::ensure_directory_exists();
		self::download_file( 'default.css' );
		self::download_file( 'default.html' );
	}

	private static function ensure_directory_exists() {
		if ( ! is_dir( SOWP_TOOLS_ABSPATH . '/cache/' ) ) {
			mkdir( SOWP_TOOLS_ABSPATH . '/cache/' );
		}

		if ( ! is_dir( SOWP_TOOLS_ABSPATH . '/cache/topbar/' ) ) {
			mkdir( SOWP_TOOLS_ABSPATH . '/cache/topbar/' );
		}
	}

	private static function download_file( $filename ) {
		if ( ! function_exists( 'download_url' ) ) {
			include_once ABSPATH . '/wp-admin/includes/file.php';
		}

		$url = 'http://siecobywatelska.pl/sowp-tools/topbar/get_file.php';
		$url = add_query_arg( 'site', home_url(), $url );
		$url = add_query_arg( 'filename', $filename, $url );

		$tmpfile = download_url( $url , 300 );
		copy( $tmpfile, SOWP_TOOLS_ABSPATH . '/cache/topbar/' . $filename );
		unlink( $tmpfile ); // must unlink afterwards
	}

	private function schedule_event() {
		if ( ! wp_next_scheduled( 'sowp_tools_toolbar_update_file' ) ) {
			wp_schedule_event( time(),  WEEK_IN_SECONDS, 'sowp_tools_toolbar_update_file' );
		}
	}

	private function unschedule_event() {
		$timestamp = wp_next_scheduled( 'sowp_tools_toolbar_update_file' );
		wp_unschedule_event( $timestamp, 'sowp_tools_toolbar_update_file' );
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}