<?php

class AjaxHandler
{
	function __construct()
	{
		add_action( 'admin_init'  , array( $this, 'mo_wpns_saml_actions' ) );
	}

	function mo_wpns_saml_actions()
	{
		global $moWpnsUtility,$dirName;

		if (current_user_can( 'manage_options' ) && $moWpnsUtility->icr() && isset( $_REQUEST['option'] ))
		{ 
			switch($_REQUEST['option'])
			{
				case "iplookup":
					$this->lookupIP($_GET['ip']);	break;
				case "backupDB":
					$this->backupDB();				break;
				case "dissmissfeedback":
					$this->handle_feedback();		break;
				case "whitelistself":
					$this->whitelist_self();		break;
			}
		}
	}
	
	private function lookupIP($ip)
	{
		$cURL = new MocURL();
		$result 	= json_decode($cURL->lookupIP($ip),true);
		$hostname 	= gethostbyaddr($result["ipDetails"]["location.ip"]);
		$timeoffset	= timezone_offset_get(new DateTimeZone($result["ipDetails"]["location.timeZone"]),new DateTime('now'));
		$timeoffset = $timeoffset/3600;

		$ipLookUpTemplate  = MoWpnsConstants::IP_LOOKUP_TEMPLATE; 

		$ipLookUpTemplate  = str_replace("{{ip}}"  	 	 ,$result["ipDetails"]["location.ip"]			,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{isp}}" 	 	 ,$result["ipDetails"]["location.isp"]			,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{region}}" 	 ,$result["ipDetails"]["location.region"]		,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{country}}"	 ,$result["ipDetails"]["location.countryName"]	,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{city}}"	 	 ,$result["ipDetails"]["location.city"]			,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{postalcode}}",$result["ipDetails"]["location.postalCode"]	,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{continent}}" ,$result["ipDetails"]["location.continent"]	,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{latitude}}"	 ,$result["ipDetails"]["location.latitude"]		,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{longitude}}" ,$result["ipDetails"]["location.longitude"]	,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{timezone}}"	 ,$result["ipDetails"]["location.timeZone"]		,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{hostname}}"	 ,$hostname										,$ipLookUpTemplate);
		$ipLookUpTemplate  = str_replace("{{offset}}"	 ,$timeoffset									,$ipLookUpTemplate);

		$result['ipDetails'] = $ipLookUpTemplate;						

		wp_send_json( $result );
	}
	
	private function backupDB()
	{
		if ( function_exists('memory_get_usage') && ( (int) ini_get('memory_limit') < 128 ) )
			ini_set('memory_limit', '128M' );
		global $wpdb;
		$tables 		= $wpdb->get_results("SHOW TABLES", ARRAY_N);
		$nooftables 	= count($tables);
		$query			= "";
		$tableswithfk 	= array();
		$tableswithoutfk= array();

		foreach($tables as $table)
		{
			if(is_array($table))
				$table = $table[0];
			$createtable = $wpdb->get_results("SHOW CREATE TABLE  $table", ARRAY_A);
			if(!empty($createtable[0]))
			{
				$createquery = $createtable[0]['Create Table'];
				if (strpos($createquery, 'FOREIGN KEY') !== false) 
					array_push($tableswithfk,$table);
				else
					array_push($tableswithoutfk, $table);
			}
		}
		
		$query .= $this->get_table_query($query,$tableswithoutfk);

		$query .= $this->get_table_query($query,$tableswithfk);

		$fileName = $this->create_db_backup_file($query);
		wp_send_json($fileName);
	}

	private function get_table_query($query,$tables)
	{
		global $wpdb;
		foreach($tables as $table)
		{
			$createtable = $wpdb->get_results("SHOW CREATE TABLE  $table", ARRAY_A);
			if(!empty($createtable[0]))
			{		
				$createquery = $createtable[0]['Create Table'];		
				$query 	    .= 'DROP TABLE IF EXISTS '.$table.";\n";
				$query 	    .= $createquery.";\n\n";
				$data    	 = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);
				foreach($data as $record)
				{
					if(count($record)>0)
					{
						$query.= 'INSERT INTO '.$table.' VALUES(';
						$i=0;
						foreach($record as $key=>$value)
						{
							$value = addslashes($value);
							if (isset($value))
								$query.= '"'.$value.'"' ;
							else
								$query.= '""';
							if ($i < (count($record)-1)) { $query.= ','; }
							$i++;
						}
						$query.= ");\n";
					}
				}
				$query.="\n\n";
			}
		}
		return $query;
	}


	private function create_db_backup_file($data)
	{
		$basepath = get_home_path();
		if(!file_exists($basepath."db-backups")){
			mkdir($basepath."db-backups");
		}
		
		$filename = 'db-backup-'.time().'.sql';
		$handle = fopen($basepath."db-backups".DIRECTORY_SEPARATOR .$filename,'w+');
		fwrite($handle,$data);
		fclose($handle);
		return $filename;
	}

	private function handle_feedback()
	{
		update_option('donot_show_feedback_message',1);
		wp_send_json('success');
	}

	private function whitelist_self()
	{
		global $moWpnsUtility;
		$moPluginsUtility = new MoWpnsHandler();
		$moPluginsUtility->whitelist_ip($moWpnsUtility->get_client_ip());
		wp_send_json('success');
	}

}new AjaxHandler;