<?php

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	class MoWpnsDB
	{
		private $transactionTable;
		private $blockedIPsTable;
		private $whitelistIPsTable;
		private $emailAuditTable;

		function __construct()
		{
			global $wpdb;
			$this->transactionTable		= $wpdb->prefix.'wpns_transactions';
			$this->blockedIPsTable 		= $wpdb->prefix.'wpns_blocked_ips';
			$this->whitelistIPsTable	= $wpdb->prefix.'wpns_whitelisted_ips';
			$this->emailAuditTable		= $wpdb->prefix.'wpns_email_sent_audit';
		}

		function mo_plugin_activate()
		{
			global $wpdb;
			if(!get_option('mo_wpns_dbversion'))
			{
				update_option('mo_wpns_dbversion', MoWpnsConstants::DB_VERSION );
				$this->generate_tables();
			} 
			else 
			{
				$current_db_version = get_option('mo_wpns_dbversion');
				if($current_db_version < MoWpnsConstants::DB_VERSION)
					update_option('mo_wpns_dbversion', MoWpnsConstants::DB_VERSION );
				//update the tables based on DB_VERSION.
			}
		}

		function generate_tables()
		{
			global $wpdb;
			
			$tableName = $this->transactionTable;
			if($wpdb->get_var("show tables like '$tableName'") != $tableName) 
			{
				$sql = "CREATE TABLE " . $tableName . " (
				`id` bigint NOT NULL AUTO_INCREMENT, `ip_address` mediumtext NOT NULL ,  `username` mediumtext NOT NULL ,
				`type` mediumtext NOT NULL , `url` mediumtext NOT NULL , `status` mediumtext NOT NULL , `created_timestamp` int, UNIQUE KEY id (id) );";
				dbDelta($sql);
			}

			$tableName = $this->blockedIPsTable;
			if($wpdb->get_var("show tables like '$tableName'") != $tableName) 
			{
				$sql = "CREATE TABLE " . $tableName . " (
				`id` int NOT NULL AUTO_INCREMENT, `ip_address` mediumtext NOT NULL , `reason` mediumtext, `blocked_for_time` int,
				`created_timestamp` int, UNIQUE KEY id (id) );";
				dbDelta($sql);
			}
			

			$tableName = $this->whitelistIPsTable;
			if($wpdb->get_var("show tables like '$tableName'") != $tableName) 
			{
				$sql = "CREATE TABLE " . $tableName . " (
				`id` int NOT NULL AUTO_INCREMENT, `ip_address` mediumtext NOT NULL , `created_timestamp` int, UNIQUE KEY id (id) );";
				dbDelta($sql);
			}
			

			$tableName = $this->emailAuditTable;
			if($wpdb->get_var("show tables like '$tableName'") != $tableName) 
			{
				$sql = "CREATE TABLE " . $tableName . " (
				`id` int NOT NULL AUTO_INCREMENT, `ip_address` mediumtext NOT NULL , `username` mediumtext NOT NULL, `reason` mediumtext, `created_timestamp` int, UNIQUE KEY id (id) );";
				dbDelta($sql);
			}
		}

		function get_ip_blocked_count($ipAddress)
		{
			global $wpdb;
			return $wpdb->get_var( "SELECT COUNT(*) FROM ".$this->blockedIPsTable." WHERE ip_address = '".$ipAddress."'" );
		}

		function get_blocked_ip($entryid)
		{
			global $wpdb;
			return $wpdb->get_results( "SELECT ip_address FROM ".$this->blockedIPsTable." WHERE id=".$entryid );
		}

		function get_blocked_ip_list()
		{
			global $wpdb;
			return $wpdb->get_results("SELECT id, reason, ip_address, created_timestamp FROM ".$this->blockedIPsTable);
		}

		function insert_blocked_ip($ipAddress,$reason,$blocked_for_time)
		{
			global $wpdb;
			$wpdb->insert( 
				$this->blockedIPsTable, 
				array( 
					'ip_address' => $ipAddress, 
					'reason' => $reason,
					'blocked_for_time' => $blocked_for_time,
					'created_timestamp' => current_time( 'timestamp' )
				)
			);
			return;
		}

		function delete_blocked_ip($entryid)
		{
			global $wpdb;
			$wpdb->query( 
				"DELETE FROM ".$this->blockedIPsTable."
				 WHERE id = ".$entryid
			);
			return;
		}

		function get_whitelisted_ip_count($ipAddress)
		{
			global $wpdb;
			return $wpdb->get_var( "SELECT COUNT(*) FROM ".$this->whitelistIPsTable." WHERE ip_address = '".$ipAddress."'" );
		}

		function insert_whitelisted_ip($ipAddress)
		{
			global $wpdb;
			$wpdb->insert( 
				$this->whitelistIPsTable, 
				array( 
					'ip_address' => $ipAddress, 
					'created_timestamp' => current_time( 'timestamp' )
				)
			);
		}

		function delete_whitelisted_ip($entryid)
		{
			global $wpdb;
			$wpdb->query( 
				"DELETE FROM ".$this->whitelistIPsTable."
				 WHERE id = ".$entryid
			);
			return;
		}

		function get_whitelisted_ips_list()
		{
			global $wpdb;
			return $wpdb->get_results( "SELECT id, ip_address, created_timestamp FROM ".$this->whitelistIPsTable );
		}

		function get_email_audit_count($ipAddress,$username)
		{
			global $wpdb;
			return $wpdb->get_var( "SELECT COUNT(*) FROM ".$this->emailAuditTable." WHERE ip_address = '".$ipAddress."' AND 
			username='".$username."'" );
		}

		function insert_email_audit($ipAddress,$username,$reason)
		{
			global $wpdb;
			$wpdb->insert( 
				$this->emailAuditTable, 
				array( 
					'ip_address' => $ipAddress,
					'username' => $username,
					'reason' => $reason,
					'created_timestamp' => current_time( 'timestamp' )
				)
			);
			return;
		}

		function insert_transaction_audit($ipAddress,$username,$type,$status,$url=null)
		{
			global $wpdb;
			$data 		= array( 
							'ip_address' 		=> $ipAddress, 
							'username' 	 		=> $username,
							'type' 		 		=> $type,
							'status' 	 		=> $status,
							'created_timestamp' => current_time( 'timestamp' )
						);
			$data['url'] = is_null($url) ? '' : $url;  
			$wpdb->insert(  $this->transactionTable, $data);
			return;
		}

		function get_transasction_list()
		{
			global $wpdb;
			return $wpdb->get_results( "SELECT ip_address, username, type, status, created_timestamp FROM ".$this->transactionTable." order by id desc limit 5000" );
		}

		function get_login_transaction_report()
		{
			global $wpdb;
			return $wpdb->get_results( "SELECT ip_address, username, status, created_timestamp FROM ".$this->transactionTable." WHERE type='User Login' order by id desc limit 5000" );
		}

		function get_error_transaction_report()
		{
			global $wpdb;
			return $wpdb->get_results( "SELECT ip_address, username, url, type, created_timestamp FROM ".$this->transactionTable." WHERE type <> 'User Login' order by id desc limit 5000" );
		}

		function update_transaction_table($where,$update)
		{
			global $wpdb;

			$sql = "UPDATE ".$this->transactionTable." SET ";
			$i = 0;
			foreach($update as $key=>$value)
			{
				if($i%2!=0)
					$sql .= ' , ';
				$sql .= $key."='".$value."'";
				$i++;
			}
			$sql .= " WHERE ";
			$i = 0;
			foreach($where as $key=>$value)
			{
				if($i%2!=0)
					$sql .= ' AND ';
				$sql .= $key."='".$value."'";
				$i++;
			}
			
			$wpdb->query($sql);
			return;
		}

		function get_failed_transaction_count($ipAddress)
		{
			global $wpdb;
			return $wpdb->get_var( "SELECT COUNT(*) FROM ".$this->transactionTable." WHERE ip_address = '".$ipAddress."'
			AND status = '".MoWpnsConstants::FAILED."'" );
		}

		function delete_transaction($ipAddress)
		{
			global $wpdb;
			$wpdb->query( 
				"DELETE FROM ".$this->transactionTable." 
				WHERE ip_address = '".$ipAddress."' AND status='".MoWpnsConstants::FAILED."'"
			);
			return;
		}
	}