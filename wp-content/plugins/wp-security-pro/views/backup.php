<?php
	
echo'
	<div class="mo_wpns_divided_layout">
		<div class="mo_wpns_small_layout">';

			is_customer_valid();

echo'		<h3>Database Backup</h3>
			<form id="mo_wpns_db_backup" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_db_backup" />
				<p>Backup your WordPress database easily with a single click. Your backup will be saved under <b>db-backups</b> folder inside wordpress installation directory.</p>
				<input type="submit" '.$disabled.' name="submit" style="width:100px;" value="Backup Now" class="button button-primary button-large" />
			</form>
			<div class="db_backup_desc" hidden></div>
		</div>
	</div>
	<script>
		var message = "'.$message.'";
		jQuery(document).ready(function() {
			$("#mo_wpns_db_backup").on("submit",function (e){
				$(".db_backup_desc").empty();
			    $(".db_backup_desc").append(message);
			    $(".db_backup_desc").slideDown(400);
			    setInterval(function(){  $("#inprogress").fadeOut(700); }, 1000);
			    setInterval(function(){  $("#inprogress").fadeIn(700); }, 1000);
			    $.ajax({
			        url: "'.$page_url.'",
			        type: "GET",
			        data: "option=backupDB",
			        crossDomain: !0,
			        dataType: "json",
			        contentType: "application/json; charset=utf-8",
			        success: function(o) {
			        	$("#dbloader").empty();
			        	var result = JSON.stringify(o);
			        	$("#dbloader").append("'.$message2a.' "+result+" '.$message2b.'");
			        	$(".backupmessage").css("background-color","#1EC11E");
			        	$(".backupmessage h2").empty();
			        	$(".backupmessage h2").append("DATABASE BACKUP COMPLETE");
			        },
			        error: function(o, e, n) {}
			    });
			    e.preventDefault();
			});
		} );
	</script>';