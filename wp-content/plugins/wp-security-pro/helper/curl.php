<?php

class MocURL
{

	public static function create_customer($email, $company, $password, $phone = '', $first_name = '', $last_name = '')
	{
		$url = MoWpnsConstants::HOST_NAME . '/moas/rest/customer/add';
		$fields = array (
			'companyName' 	 => $company,
			'areaOfInterest' => 'WP Security Pro',
			'firstname' 	 => $first_name,
			'lastname' 		 => $last_name,
			'email' 		 => $email,
			'phone' 		 => $phone,
			'password' 		 => $password
		);
		$json = json_encode($fields);
		$response = self::callAPI($url, $json);
		return $response;
	}
	
	public static function get_customer_key($email, $password) 
	{
		$url 	= MoWpnsConstants::HOST_NAME. "/moas/rest/customer/key";
		$fields = array (
					'email' 	=> $email,
					'password'  => $password
				);
		$json = json_encode($fields);
		$response = self::callAPI($url, $json);
		return $response;
	}
	
	function submit_contact_us( $q_email, $q_phone, $query )
	{
		$current_user = wp_get_current_user();
		$url    = MoWpnsConstants::HOST_NAME . "/moas/rest/customer/contact-us";
		$query  = '[WP Network Security]: ' . $query;
		$fields = array(
					'firstName'	=> $current_user->user_firstname,
					'lastName'	=> $current_user->user_lastname,
					'company' 	=> $_SERVER['SERVER_NAME'],
					'email' 	=> $q_email,
					'phone'		=> $q_phone,
					'query'		=> $query
				);
		$field_string = json_encode( $fields );
		$response = self::callAPI($url, $field_string);
		return true;
	}

	function lookupIP($ip)
	{
		$url 	= MoWpnsConstants::HOST_NAME. "/moas/rest/security/iplookup";
		$fields = array (
					'ip' => $ip
				);
		$json = json_encode($fields);
		$response = self::callAPI($url, $json);
		return $response;
	}
	
	function send_otp_token($auth_type, $phone, $email)
	{
		
		$url 		 = MoWpnsConstants::HOST_NAME . '/moas/api/auth/challenge';
		$customerKey = MoWpnsConstants::DEFAULT_CUSTOMER_KEY;
		$apiKey 	 = MoWpnsConstants::DEFAULT_API_KEY;

		$fields  	 = array(
							'customerKey' 	  => $customerKey,
							'email' 	  	  => $email,
							'phone' 	  	  => $phone,
							'authType' 	  	  => $auth_type,
							'transactionName' => 'WP Security Pro'
						);
		$json 		 = json_encode($fields);
		$authHeader  = $this->createAuthHeader($customerKey,$apiKey);
		$response 	 = self::callAPI($url, $json, $authHeader);
		return $response;
	}

	function validate_recaptcha($ip,$response)
	{
		$url 		 = MoWpnsConstants::RECAPTCHA_VERIFY;
		$json		 = "";
		$fields 	 = array(
							'response' => $response,
							'secret'   => get_option('mo_wpns_recaptcha_secret_key'),
							'remoteip' => $ip
						);
		foreach($fields as $key=>$value) { $json .= $key.'='.$value.'&'; }
		rtrim($json, '&');
		$response 	 = self::callAPI($url, $json, null);
		return $response;
	}

	function validate_otp_token($transactionId,$otpToken)
	{
		$url 		 = MoWpnsConstants::HOST_NAME . '/moas/api/auth/validate';
		$customerKey = MoWpnsConstants::DEFAULT_CUSTOMER_KEY;
		$apiKey 	 = MoWpnsConstants::DEFAULT_API_KEY;

		$fields 	 = array(
						'txId'  => $transactionId,
						'token' => $otpToken,
					 );

		$json 		 = json_encode($fields);
		$authHeader  = $this->createAuthHeader($customerKey,$apiKey);
		$response    = self::callAPI($url, $json, $authHeader);
		return $response;
	}
	
	function check_customer($email)
	{
		$url 	= MoWpnsConstants::HOST_NAME . "/moas/rest/customer/check-if-exists";
		$fields = array(
					'email' 	=> $email,
				);
		$json     = json_encode($fields);
		$response = self::callAPI($url, $json);
		return $response;
	}
	
	function mo_wpns_forgot_password()
	{
	
		$url 		 = MoWpnsConstants::HOST_NAME . '/moas/rest/customer/password-reset';
		$email       = get_option('mo_wpns_admin_email');
		$customerKey = get_option('mo_wpns_admin_customer_key');
		$apiKey 	 = get_option('mo_wpns_admin_api_key');
	
		$fields 	 = array(
						'email' => $email
					 );
	
		$json 		 = json_encode($fields);
		$authHeader  = $this->createAuthHeader($customerKey,$apiKey);
		$response    = self::callAPI($url, $json, $authHeader);
		return $response;
	}

	function send_notification($toEmail,$subject,$content,$fromEmail,$fromName,$toName)
	{
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		$headers .= 'From: '.$fromName.'<'.$fromEmail.'>' . "\r\n";
		//$headers .= 'Cc: cc@example.com' . "\r\n";

		mail($toEmail,$subject,$content,$headers);

		return json_encode(array("status"=>'SUCCESS','statusMessage'=>'SUCCESS'));
	}


	private static function createAuthHeader($customerKey, $apiKey) {
		$currentTimestampInMillis = round(microtime(true) * 1000);
		$currentTimestampInMillis = number_format($currentTimestampInMillis, 0, '', '');

		$stringToHash = $customerKey . $currentTimestampInMillis . $apiKey;
		$authHeader = hash("sha512", $stringToHash);

		$header = array (
			"Content-Type: application/json",
			"Customer-Key: $customerKey",
			"Timestamp: $currentTimestampInMillis",
			"Authorization: $authHeader"
		);
		return $header;
	}


	private static function callAPI($url, $json_string, $headers = array("Content-Type: application/json")) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_ENCODING, "");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		if(!is_null($headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
		$content = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Request Error:' . curl_error($ch);
			exit();
		}

		curl_close($ch);
		return $content;
	}

}