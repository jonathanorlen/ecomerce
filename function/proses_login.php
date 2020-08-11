<?php 
	include_once("connection.php");
	include_once("helper.php");
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = mysqli_query($connection,"SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on' ");

	if(mysqli_num_rows($query) == 0){
		header("location:".BASE_URL."index.php?page=login&notif=true");
	}else{
		
		$row = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];
		header("location:".BASE_URL."index.php?page=my_profile&module=pesan&action=list"); 
	}