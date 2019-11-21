<?php
	
	global $moWpnsUtility,$dirName;

	$registered 	= $moWpnsUtility->icr();

	$profile_url	= add_query_arg( array('page' => 'wpnsaccount'			), $_SERVER['REQUEST_URI'] );
	$login_security	= add_query_arg( array('page' => 'default'			), $_SERVER['REQUEST_URI'] );
	$register_url	= add_query_arg( array('page' => 'registration'		), $_SERVER['REQUEST_URI'] );
	$blocked_ips	= add_query_arg( array('page' => 'blockedips'		), $_SERVER['REQUEST_URI'] );
	$advance_block	= add_query_arg( array('page' => 'advancedblocking'	), $_SERVER['REQUEST_URI'] );
	$notif_url		= add_query_arg( array('page' => 'notifications'	), $_SERVER['REQUEST_URI'] );
	$reports_url	= add_query_arg( array('page' => 'reports'			), $_SERVER['REQUEST_URI'] );
	$license_url	= add_query_arg( array('page' => 'licencing'		), $_SERVER['REQUEST_URI'] );
	$help_url		= add_query_arg( array('page' => 'troubleshooting'	), $_SERVER['REQUEST_URI'] );
	$content_protect= add_query_arg( array('page' => 'content_protect'	), $_SERVER['REQUEST_URI'] );
	$backup			= add_query_arg( array('page' => 'backup'			), $_SERVER['REQUEST_URI'] );
	$logo_url		= plugin_dir_url($dirName) . 'wp-security-pro/includes/images/miniorange_logo.png';
	$shw_feedback	= get_option('donot_show_feedback_message') ? false: true;
	$moPluginHandler= new MoWpnsHandler();
	$safe			= $moPluginHandler->is_whitelisted($moWpnsUtility->get_client_ip());

	$active_tab 	= $_GET['page'];

	include $dirName . 'views/navbar.php';