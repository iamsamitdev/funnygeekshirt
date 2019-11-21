<?php 

echo'<div class="mo_wpns_divided_layout">	
		<div class="mo_wpns_small_layout">';	
		
			is_customer_valid();

echo'		<h3>Email Notifications</h3>
			<form id="mo_wpns_enable_ip_blocked_email_to_admin" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_enable_ip_blocked_email_to_admin">
				<input type="checkbox" '.$disabled.' name="enable_ip_blocked_email_to_admin" '.$notify_admin_on_ip_block.' onchange="document.getElementById(\'mo_wpns_enable_ip_blocked_email_to_admin\').submit();"> Notify Administrator if IP address is blocked.
				<a style="cursor:pointer" id="custom_admin_template_expand">Customize Email Template</a>
			</form>
			<form id="custom_admin_template_form" method="post" class="hidden">
				<input type="hidden" name="option" value="custom_admin_template">
				<br><br>';

				wp_editor($template1, $template_type1, $ip_blocking_template); 
				submit_button( 'Save Template' );

echo'		</form>
			<br>
			<form id="mo_wpns_enable_unusual_activity_email_to_user" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_enable_unusual_activity_email_to_user">
				<input type="checkbox" '.$disabled.' name="enable_unusual_activity_email_to_user" '.$notify_admin_unusual_activity.' onchange="document.getElementById(\'mo_wpns_enable_unusual_activity_email_to_user\').submit();"> Notify users for unusual activity with their account.
				<a style="cursor:pointer" id="custom_user_template_expand">Customize Email Template</a>
			</form>
			<form id="custom_user_template_form" method="post" class="hidden">
				<input type="hidden" name="option" value="custom_user_template">
				<br><br>';

				wp_editor($template2, $template_type2, $user_activity_template); 
				submit_button( 'Save Template' );

echo'		</form>
			<br>
		</div>
	</div>
	<script>
		jQuery(document).ready(function(){
			$("#custom_admin_template_expand").click(function() {
				$("#custom_admin_template_form").slideToggle();
			});
			$("#custom_user_template_expand").click(function() {
				$("#custom_user_template_form").slideToggle();
			});
		});
	</script>';