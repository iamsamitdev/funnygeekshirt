<?php
	
global $moWpnsUtility,$dirName;

$img_loader_url		= plugins_url('wp-security-pro/includes/images/loader.gif');
$page_url			= "";
$disabled			= !$registered ? "disabled" : "";
$message			= '<div id=\'backupmessage\'><h2>DO NOT DO THE FOLLOWING AS IT WILL CAUSE YOUR BACKUP TO FAIL:</h2><ol><li>Close this browser</li><li>Reload this page</li><li>Click the Stop or Back buttons in your browser</li></ol></div><br/><div class=\'backupmessage\'><h2><div id=\'inprogress\'>DATABASE BACKUP IN PROGRESS</div></h2></div><div id=\'dbloader\' ><img  src=\"'.$img_loader_url.'\"></div>';
$message2a			= 'Database Backup Complete. Check <b><i>';
$message2b			= '</i></b>file in db-backups folder.';

include $dirName . 'views/backup.php';