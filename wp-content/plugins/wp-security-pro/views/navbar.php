<?php

	if($shw_feedback)
		do_action('wpns_show_message',MoWpnsMessages::showMessage('FEEDBACK'),'CUSTOM_MESSAGE');
	if(!$safe)
		do_action('wpns_show_message',MoWpnsMessages::showMessage('WHITELIST_SELF'),'CUSTOM_MESSAGE');

	echo'<div class="wrap">
				<div><img  style="float:left;margin-top:5px;" src="'.$logo_url.'"></div>
				<h1>
					WP Security Pro &nbsp;
					<a class="add-new-h2" href="'.$profile_url.'">Account</a>
					<a class="add-new-h2" href="'.$help_url.'">Troubleshooting</a>
					<a class="license-button add-new-h2" href="'.$license_url.'">Upgrade</a>
				</h1>			
		</div>';
		//check_is_curl_installed();

	echo'<div id="tab">
			<h2 class="nav-tab-wrapper">';

			
		echo '	<a class="nav-tab '.($active_tab == 'default' 		  ? 'nav-tab-active' : '').'" href="'.$login_security	.'">Login Security</a>
				<a class="nav-tab '.($active_tab == 'registration'    ? 'nav-tab-active' : '').'" href="'.$register_url		.'">Registration Security</a>
				<a class="nav-tab '.($active_tab == 'content_protect' ? 'nav-tab-active' : '').'" href="'.$content_protect	.'">Content & SPAM</a>
				<a class="nav-tab '.($active_tab == 'backup' 	  	  ? 'nav-tab-active' : '').'" href="'.$backup			.'">Backup</a>
				<a class="nav-tab '.($active_tab == 'blockedips' 	  ? 'nav-tab-active' : '').'" href="'.$blocked_ips		.'">IP Blocking</a>
				<a class="nav-tab '.($active_tab == 'advancedblocking'? 'nav-tab-active' : '').'" href="'.$advance_block	.'">Advanced Blocking</a>
				<a class="nav-tab '.($active_tab == 'notifications'	  ? 'nav-tab-active' : '').'" href="'.$notif_url		.'">Notifications</a>
				<a class="nav-tab '.($active_tab == 'reports'	  	  ?	'nav-tab-active' : '').'" href="'.$reports_url		.'">Reports</a>
			</h2>
		</div>';