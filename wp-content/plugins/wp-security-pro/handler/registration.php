<?php

	class RegistrationHandler
	{
		function __construct()
		{
			add_filter( 'registration_errors' , array($this, 'mo_wpns_registration_validations' ), 10, 3 );			
		}

		function mo_wpns_registration_validations( $errors, $sanitized_user_login, $user_email ) 
		{
			global $moWpnsUtility;

			if(get_option('mo_wpns_activate_recaptcha_for_registration'))
				$recaptchaError = $moWpnsUtility->verify_recaptcha($_POST['g-recaptcha-response']);

			if($moWpnsUtility->check_if_valid_email($user_email) && empty($recaptchaError->errors))
				$errors->add( 'blocked_email_error', __( '<strong>ERROR</strong>: Your email address is not allowed to register. Please select different email address.') );
			else if(!empty($recaptchaError->errors))
				$errors = $recaptchaError;
				
			return $errors;
		}

	}
	new RegistrationHandler;