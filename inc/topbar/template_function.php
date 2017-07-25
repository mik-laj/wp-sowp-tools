<?php

function sowp_topbar() {
	if ( file_exists( SOWP_TOOLS_ABSPATH . '/cache/topbar/default.html' ) ) {
		include SOWP_TOOLS_ABSPATH . '/cache/topbar/default.html';
	} else {
		include SOWP_TOOLS_ABSPATH . '/views/topbar/default.php';
	}
}