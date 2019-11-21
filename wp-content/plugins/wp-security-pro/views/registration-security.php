<?php

echo'<div class="mo_wpns_divided_layout">	
		<div class="mo_wpns_small_layout">';

			is_customer_valid();

echo'		<h3>Block Registerations from fake users</h3>
			<div class="mo_wpns_subheading">
				Disallow Disposable / Fake / Temporary email addresses
			</div>
			
			<form id="mo_wpns_enable_fake_domain_blocking" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_enable_fake_domain_blocking">
				<input type="checkbox" '.$disabled.' name="mo_wpns_enable_fake_domain_blocking" '.$domain_blocking.' onchange="document.getElementById(\'mo_wpns_enable_fake_domain_blocking\').submit();"> Enable blocking registrations from fake users.
			</form>
			<br>
		</div>
		
		<div class="mo_wpns_small_layout">	
			<h3>Advanced User Verification</h3>
			<div class="mo_wpns_subheading">Verify identity of user by sending One Time Password ( OTP ) on his phone number or email address.</div>
			
			<form id="mo_wpns_advanced_user_verification" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_advanced_user_verification">
				<input type="checkbox" '.$disabled.' name="mo_wpns_enable_advanced_user_verification" '.$user_verify.' onchange="document.getElementById(\'mo_wpns_advanced_user_verification\').submit();"> Enable advanced user verification<br>
			</form>';

			if($user_verify)
				echo $html1;
			
echo'		<br>
		</div>
		
		<div class="mo_wpns_small_layout">	
			<h3>Social Login Integration</h3>
			<div class="mo_wpns_subheading">Allow your user to login and auto-register with their favourite social network like Google, Twitter, Facebook, Vkontakte, LinkedIn, Instagram, Amazon, Salesforce, Windows Live.</div>
			
			<form id="mo_wpns_social_integration" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_social_integration">
				<input type="checkbox" '.$disabled.' name="mo_wpns_enable_social_integration" '.$social_login.' onchange="document.getElementById(\'mo_wpns_social_integration\').submit();"> Enable login and registrations with social networks.<br>
			</form>';
			
			if($social_login)
				echo $html2;
				
echo'	</div>
	</div>';