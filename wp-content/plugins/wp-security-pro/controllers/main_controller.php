<?php

	global $moWpnsUtility,$dirName;

	$registered = $moWpnsUtility->icr();
	$controller = $dirName . 'controllers/';

	include $controller 	 . 'navbar.php';

	if( isset( $_GET[ 'page' ])) 
	{
		switch($_GET['page'])
		{
			case 'default':
				include $controller . 'login-security.php';			break;
			case 'wpnsaccount':
				include $controller . 'account.php';				break;		
			case 'registration':
				include $controller . 'registration-security.php'; 	break;
			case 'backup':
				include $controller . 'backup.php'; 				break;
			case 'blockedips':
				include $controller . 'ip-blocking.php';			break;
			case 'content_protect':
				include $controller . 'content-protection.php';		break;
			case 'advancedblocking':
				include $controller . 'advanced-blocking.php';		break;
			case 'notifications':
				include $controller . 'notification-settings.php';	break;
			case 'reports':
				include $controller . 'reports.php';				break;
			case 'licencing':
				include $controller . 'licensing.php';				break;
			case 'troubleshooting':
				include $controller . 'troubleshooting.php';		break;
		}
	}

	include $controller . 'support.php';