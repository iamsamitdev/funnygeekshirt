<?php 
	
	global $moWpnsUtility,$dirName;
	$mo_wpns_handler 	= new MoWpnsHandler();
	$disabled			= !$registered ? "disabled" : "";

	if(current_user_can( 'manage_options' ) && $registered && isset($_POST['option']))
	{
		switch($_POST['option'])
		{
			case "mo_wpns_manual_block_ip":
				wpns_handle_manual_block_ip($_POST['ip']);			break;
			case "mo_wpns_unblock_ip":
				wpns_handle_unblock_ip($_POST['entryid']);			break;
			case "mo_wpns_whitelist_ip":
				wpns_handle_whitelist_ip($_POST['ip']);				break;
			case "mo_wpns_remove_whitelist":
				wpns_handle_remove_whitelist($_POST['entryid'] );	break;
		}
	}

	$blockedips 		= $mo_wpns_handler->get_blocked_ips();
	$whitelisted_ips 	= $mo_wpns_handler->get_whitelisted_ips();
	$img_loader_url		= plugins_url('wp-security-pro/includes/images/loader.gif');
	$page_url			= "";
	$license_url		= add_query_arg( array('page' => 'licencing'), $_SERVER['REQUEST_URI'] );

	include $dirName . 'views/ip-blocking.php';

/** IP BLOCKING RELATED FUNCTIONS **/

	// Function to handle Manual Block IP form submit
	function wpns_handle_manual_block_ip($ip)
	{
		
		global $moWpnsUtility;	

		if( $moWpnsUtility->check_empty_or_null( $ip) )
		{
			do_action('wpns_show_message',MoWpnsMessages::showMessage('INVALID_IP'),'ERROR');
		} 
		else
		{
			$ipAddress 		= sanitize_text_field( $ip );
			$mo_wpns_config = new MoWpnsHandler();
			$isWhitelisted 	= $mo_wpns_config->is_whitelisted($ipAddress);
			if(!$isWhitelisted)
			{
				if($mo_wpns_config->is_ip_blocked($ipAddress)){
					do_action('wpns_show_message',MoWpnsMessages::showMessage('IP_ALREADY_BLOCKED'),'ERROR');
				} else{
					$mo_wpns_config->block_ip($ipAddress, MoWpnsConstants::BLOCKED_BY_ADMIN, true);
					do_action('wpns_show_message',MoWpnsMessages::showMessage('IP_PERMANENTLY_BLOCKED'),'SUCCESS');
				}
			}
			else
			{
				do_action('wpns_show_message',MoWpnsMessages::showMessage('IP_IN_WHITELISTED'),'ERROR');
			}
		}
	}


	// Function to handle Manual Block IP form submit
	function wpns_handle_unblock_ip($entryID)
	{
		global $moWpnsUtility;
		
		if( $moWpnsUtility->check_empty_or_null($entryID))
		{
			do_action('wpns_show_message',MoWpnsMessages::showMessage('UNKNOWN_ERROR'),'ERROR');
		}
		else
		{
			$entryid 		= sanitize_text_field($entryID);
			$mo_wpns_config = new MoWpnsHandler();
			$mo_wpns_config->unblock_ip_entry($entryid);
			do_action('wpns_show_message',MoWpnsMessages::showMessage('IP_UNBLOCKED'),'SUCCESS');
		}
	}


	// Function to handle Whitelist IP form submit
	function wpns_handle_whitelist_ip($ip)
	{
		global $moWpnsUtility;
		if( $moWpnsUtility->check_empty_or_null($ip))
		{
			do_action('wpns_show_message',MoWpnsMessages::showMessage('INVALID_IP'),'ERROR');
		}
		else
		{
			$ipAddress = sanitize_text_field($ip);
			$mo_wpns_config = new MoWpnsHandler();
			if($mo_wpns_config->is_whitelisted($ipAddress))
			{
				do_action('wpns_show_message',MoWpnsMessages::showMessage('IP_ALREADY_WHITELISTED'),'ERROR');
			}
			else
			{
				$mo_wpns_config->whitelist_ip($ip);
				do_action('wpns_show_message',MoWpnsMessages::showMessage('IP_WHITELISTED'),'SUCCESS');
			}
		}
	}


	// Function to handle remove whitelisted IP form submit
	function wpns_handle_remove_whitelist($entryID)
	{
		global $moWpnsUtility;
		if( $moWpnsUtility->check_empty_or_null($entryID))
		{
			do_action('wpns_show_message',MoWpnsMessages::showMessage('UNKNOWN_ERROR'),'ERROR');
		}
		else
		{
			$entryid = sanitize_text_field($entryID);
			$mo_wpns_config = new MoWpnsHandler();
			$mo_wpns_config->remove_whitelist_entry($entryid);
			do_action('wpns_show_message',MoWpnsMessages::showMessage('IP_UNWHITELISTED'),'SUCCESS');
		}
	}

	