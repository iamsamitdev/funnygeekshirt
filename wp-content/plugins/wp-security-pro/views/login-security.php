<?php

echo '<div class="mo_wpns_divided_layout">
		<div class="mo_wpns_small_layout">';

		is_customer_valid();

echo ' 		<h3>Brute Force Protection ( Login Protection )</h3>
			<div class="mo_wpns_subheading">This protects your site from attacks which tries to gain access / login to a site with random usernames and passwords.</div>
			
			<form id="mo_wpns_enable_brute_force_form" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_enable_brute_force">
				<input type="checkbox" '.$disabled.' name="enable_brute_force_protection" '.$brute_force_enabled.' onchange="document.getElementById(\'mo_wpns_enable_brute_force_form\').submit();"> Enable Brute force protection
			</form>
			<br>';

			if(!empty($brute_force_enabled))
			{ 
				
echo'			<form id="mo_wpns_enable_brute_force_form" method="post" action="">
					<input type="hidden" name="option" value="mo_wpns_brute_force_configuration">
					<table class="mo_wpns_settings_table">
						<tr>
							<td style="width:40%">Allowed login attempts before blocking an IP  : </td>
							<td><input '.$disabled.' class="mo_wpns_table_textbox" type="number" id="allwed_login_attempts" name="allwed_login_attempts" required placeholder="Enter no of login attempts" value="'.$allwed_login_attempts.'" /></td>
							<td></td>
						</tr>
						<tr>
							<td>Time period for which IP should be blocked  : </td>
							<td>
								<select '.$disabled.' id="time_of_blocking_type" name="time_of_blocking_type" style="width:100%;">
								  <option value="permanent" '.($time_of_blocking_type=="permanent" ? "selected" : "").'>Permanently</option>
								  <option value="months" '.($time_of_blocking_type=="months" ? "selected" : "").'>Months</option>
								  <option value="days" '.($time_of_blocking_type=="days" ? "selected" : "").'>Days</option>
								  <option value="hours" '.($time_of_blocking_type=="hours" ? "selected" : "").'>Hours</option>
								</select>
							</td>
							<td><input '.$disabled.' class="mo_wpns_table_textbox '.($time_of_blocking_type=="permanent" ? "hidden" : "").' type="number" id="time_of_blocking_val" name="time_of_blocking_val" value="'.$time_of_blocking_val.'" placeholder="How many?" /></td>
						</tr>
						<tr>
							<td>Show remaining login attempts to user : </td>
							<td><input '.$disabled.' type="checkbox" name="show_remaining_attempts" '.$remaining_attempts.' ></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td><br><input '.$disabled.' type="submit" name="submit" style="width:100px;" value="Save" class="button button-primary button-large"></td>
							<td></td>
						</tr>
					</table>
				</form>';
			}
echo'	</div>

		<div class="mo_wpns_small_layout">
			<h3>Rename Login Page URL</h3>
			<div class="mo_wpns_subheading">
            <small>Rename the login URL (slug) to something different from original wp-login.php or wp-admin to prevent automated brute force attacks.</small>
        </div>'; ?>
		
		<form id="mo_wpns_enable_rename_login_url_form" method="post" action="">
            <input type="hidden" name="option" value="mo_wpns_enable_rename_login_url">
            <input type="checkbox" name="enable_rename_login_url_checkbox" <?php if(get_option('mo_wpns_enable_rename_login_url')) echo "checked";?> onchange="document.getElementById('mo_wpns_enable_rename_login_url_form').submit();"> Enable Rename Login Page URL (<small>After enabling this you won't be able to login using <b>/wp-admin</b> or  <b>/wp-login.php</b></small>)
        </form>
        <?php if(get_option('mo_wpns_enable_rename_login_url')) {
            $login_page_url = "mylogin";
            if (get_option('login_page_url')) {
                $login_page_url = get_option('login_page_url');
            }
            ?>
            <form id="mo_wpns_enable_rename_login_url_form" method="post" action="">
                <input type="hidden" name="option" value="mo_wpns_rename_login_url_configuration">
                <table class="mo_wpns_settings_table">
                    <tr>
                        <td>Login Page URL : </td>
                        <td><?php echo site_url(); ?>/</td>
                        <td>
                            <input class="mo_wpns_table_textbox" type="text" id="login_page_url" name="login_page_url" placeholder="Enter New Login Page URL" value="<?php echo $login_page_url?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Current Login URL : </td>
                        <td colspan="2"><?php echo site_url(); ?>/<?php echo $login_page_url?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br><input type="submit" name="submit" style="width:100px;" value="Save" class="button button-primary button-large"></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        <?php } ?>
		</div>
	
		<?php echo '<div class="mo_wpns_small_layout">		
			<h3>DOS protection - Process Delays</h3>
			<div class="mo_wpns_subheading">Delays responses in case of an attacks.</div>
			
			<form id="mo_wpns_slow_down_attacks" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_slow_down_attacks">
				<input '.$disabled.' type="checkbox" name="mo_wpns_slow_down_attacks" '.$slow_down_attacks.' onchange="document.getElementById(\'mo_wpns_slow_down_attacks\').submit();"> Enable processing delays for DOS protection
			</form>';
			
			if(!empty($slow_down_attacks)) 
			{
echo'			<br>
				<form id="mo_wpns_slow_down_attacks_config" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_slow_down_attacks_config">
				<table class="mo_wpns_settings_table">
						<tr>
							<td style="width:40%">Increase Delay Time in each request by   : </td>
							<td><input '.$disabled.' class="mo_wpns_table_textbox" type="number" id="mo_wpns_slow_down_attacks_delay" name="mo_wpns_slow_down_attacks_delay" required placeholder="Number of Seconds" value="'.$attack_delay.'" /></td>
							<td> &nbsp; Seconds</td>
						</tr>
						<tr>
							<td></td>
							<td><br><input '.$disabled.' type="submit" name="submit" style="width:100px;" value="Save" class="button button-primary button-large"></td>
							<td></td>
						</tr>
				</table>
				</form>';
			}
echo'	</div>

		<div class="mo_wpns_small_layout">		
			<h3>Google reCAPTCHA</h3>
			<div class="mo_wpns_subheading">Google reCAPTCHA protects your website from spam and abuse. reCAPTCHA uses an advanced risk analysis engine and adaptive CAPTCHAs to keep automated software from engaging in abusive activities on your site. It does this while letting your valid users pass through with ease.</div>
			<form id="mo_wpns_activate_recaptcha" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_activate_recaptcha">
				<input type="checkbox" '.$disabled.' name="mo_wpns_activate_recaptcha" '.$google_recaptcha.' onchange="document.getElementById(\'mo_wpns_activate_recaptcha\').submit();"> Enable Google reCAPTCHA
			</form>';
			if($google_recaptcha)
			{
echo'			<p>Before you can use reCAPTCHA, you must need to register your domain/webiste <a href="'.$captcha_url.'" target="blank">here</a>.</p>
				<p>Enter Site key and Secret key that you get after registration.</p>
				<form id="mo_wpns_recaptcha_settings" method="post" action="">
					<input type="hidden" name="option" value="mo_wpns_recaptcha_settings">
					<table class="mo_wpns_settings_table">
						<tr>
							<td style="width:30%">Site key  : </td>
							<td style="width:30%"><input class="mo_wpns_table_textbox" '.$disabled.' type="text" name="mo_wpns_recaptcha_site_key" required placeholder="site key" value="'.$captcha_site_key.'" /></td>
							<td style="width:20%"></td>
						</tr>
						<tr>
							<td>Secret key  : </td>
							<td><input class="mo_wpns_table_textbox" type="text" '.$disabled.' name="mo_wpns_recaptcha_secret_key" required placeholder="secret key" value="'.$captcha_secret_key.'" /></td>
						</tr>
						<tr>
							<td style="vertical-align:top;">Enable reCAPTCHA for :</td>
							<td><input type="checkbox" '.$disabled.' name="mo_wpns_activate_recaptcha_for_login" '.$captcha_login.'> Login form
							<input style="margin-left:10px" '.$disabled.' type="checkbox" name="mo_wpns_activate_recaptcha_for_registration" '.$captcha_reg.' > Registration form</td>
						</tr>
					</table><br/>
					<input type="submit" '.$disabled.' value="Save Settings" class="button button-primary button-large" />
					<input type="button" '.$disabled.' value="Test reCAPTCHA Configuration" onclick="testRecaptchaConfiguration()" class="button button-primary button-large" />
				</form>';
			}

echo'	</div>
		
		<div class="mo_wpns_small_layout">		
			<h3>Mobile authentication</h3>
			<div class="mo_wpns_subheading">Rather than relying on a password alone, which can be phished or guessed, Two Factor authentication adds a second layer of security to your WordPress accounts. We support <b>QR code</b>, <b>OTP over SMS</b> and <b>Email</b>, <b>Push</b>, <b>Soft token</b> (15+ methods to choose from). </div>
			
			<form id="mo_wpns_enable_2fa" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_enable_2fa">
				<input type="checkbox" '.$disabled.' name="mo_wpns_enable_2fa" '.$enable_2fa.' onchange="document.getElementById(\'mo_wpns_enable_2fa\').submit();"> Enable Mobile Authentication
			</form>';
			
			
			if(!empty($enable_2fa))
			{
				if($twofa_status=="ACTIVE")
				{
echo 				'<br><a href="'.$twofactor_url.'">Click here to configure or change your 2nd Factor Method.</a>';
				} 
				else if($twofa_status=="INSTALLED")
				{
echo 				'<br><span style="color:red">For Mobile Authentication you need to have miniOrange 2 Factor plugin activated.</span><br><a href="'.$activateUrl.'">Click here to activate 2 Factor Plugin</a>';
				} 
				else 
				{
echo				'<br><span style="color:red">For Mobile Authentication you need to have miniOrange 2 Factor plugin installed.</span><br><a href="'.$install_link.'">Install 2 Factor Plugin</a>';
				} 
			}
				
echo		'<br>
		</div>
		
		<div class="mo_wpns_small_layout">		
			<h3>Enforce Strong Passwords </h3>
			<div class="mo_wpns_subheading">Checks the password strength of admin and other users to enhance login security</div>
			
			<form id="mo_wpns_enable_brute_force_form" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_enforce_strong_passswords">
				<input '.$disabled.' type="checkbox" name="mo_wpns_enforce_strong_passswords" '.$enforce_strong_password.' > Enable strong passwords
				
				<table style="width:100%"><tr><td style="width:58%">Select accounts for which you want to enable password security</td>
				<td><select '.$disabled.' id="mo_wpns_enforce_strong_passswords_for_accounts" name="mo_wpns_enforce_strong_passswords_for_accounts" style="width:100%;">
				  <option value="all" '.($strong_password_account=="all" ? "selected" : "").'>All Accounts</option>
				  <option value="admin" '.($strong_password_account=="admin" ? "selected" : "").'>Administrators Account Only</option>
				  <option value="user" '.($strong_password_account=="user" ? "selected" : "").'>Users Account Only</option>
				</select></td></tr></table>
				<input '.$disabled.' type="submit" name="submit" style="width:100px;" value="Save" class="button button-primary button-large">
			</form>
		</div>
		
		<div class="mo_wpns_small_layout">	
			<h3>Risk Based Access</h3>';
				
			
			if(!empty($enable_2fa))
			{ 
echo'			<form id="mo_wpns_risk_based_access" method="post" action="">
					<input type="hidden" name="option" value="mo_wpns_risk_based_access">
					<input '.$disabled.' type="checkbox" name="mo_wpns_risk_based_access" '.$rba_enabled.' > Enable risk based access<br><br>
					<b>Note:</b> Checking this option will display an option \'Remember this device\' on 2nd factor screen. In the next login from the same device, user will bypass 2nd factor, i.e. user will be logged in through username + password only.
					<br><br>
					<input type="submit" name="submit" style="width:100px;" value="Save" class="button button-primary button-large">
				</form>';
				
				if($twofa_status=="INSTALLED")
				{
echo'				<br><span style="color:red">For Risk Based Access you need to have miniOrange 2 Factor plugin activated.</span><br><a href="'.$activateUrl.'">Click here to activate 2 Factor Plugin</a>';
				} 
				else if( $twofa_status!="ACTIVE" && $twofa_status!="INSTALLED")
				{
echo'				<br><span style="color:red">For Risk Based Access you need to have miniOrange 2 Factor plugin installed.</span><br><a href="'.$install_link.'">Install 2 Factor Plugin</a>';
				} 
			} 
			else 
			{ 
echo'				<form id="mo_wpns_rba_enable_2fa" method="post" action="">
						<input type="hidden" name="option" value="mo_wpns_rba_enable_2fa">
					</form>
					<span style="color:red">Mobile authentication (2 Factor) need to be enabled to use this option. <a style="cursor:pointer;" onclick="document.getElementById(\'mo_wpns_rba_enable_2fa\').submit();">Click here</a> to enable mobile authentication.</span><br>';
			}
			
echo'		<br>
		</div>
	</div>
	
	<script>
		jQuery(document).ready(function(){
			$("#time_of_blocking_type").change(function() {
				if($(this).val()=="permanent")
					$("#time_of_blocking_val").addClass("hidden");
				else
					$("#time_of_blocking_val").removeClass("hidden");	
			});
		});	
		function testRecaptchaConfiguration(){
			var myWindow = window.open("'.$test_recaptcha_url.'", "Test Google reCAPTCHA Configuration", "width=600, height=600");	
		}
	</script>';