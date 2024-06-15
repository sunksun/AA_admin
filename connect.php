<?php
    $serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "sbadmin";

	$conn = new mysqli($serverName,$userName,$userPassword,$dbName);
    $conn -> set_charset("utf8");
?>