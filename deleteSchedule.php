<?php
	$id=$_GET["id"];
	require_once "controllers/scheduleController.php";
	$schedule=deleteSchedule($id);
?>