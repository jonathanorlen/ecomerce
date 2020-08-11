<?php
	
	include_once("../../function/connection.php");
	include_once("../../function/helper.php");

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$phone = $_POST['phone'];
	$level = $_POST['level'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	if($button == "Add"){
		mysqli_query($connection,"INSERT INTO user(nama,email,alamat,phone,level,status) VALUES('$nama','$email','$alamat','$phone','$level','$status')");
	}else if($button == "Update"){
		$id = $_GET['id'];
		mysqli_query($connection,"UPDATE user SET nama='$nama',
				email='$email',
				alamat='$alamat',
				phone='$phone',
				level='$level',
		status='$status' WHERE id='$id'");
	}
	header("location:".BASE_URL."index.php?page=my_profile&module=user&action=list");		