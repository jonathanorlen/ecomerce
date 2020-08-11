<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "marketplace";

	$connection = mysqli_connect($server, $username, $password, $database) or die("Koneksi Gagal");