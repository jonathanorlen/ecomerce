<?php
define("BASE_URL","http://localhost/marketplace/");


function rupiah($nilai = 0){
	$result  = "Rp ". number_format($nilai);
	return $result;
}

function kategori($kategori_id = false){
	global $connection;
	$string ='<div class="btn-group-vertical col-md-12">';
	$query = mysqli_query($connection,"SELECT * FROM kategori WHERE status='on'");

	while($row=mysqli_fetch_assoc($query)){
		if($row['kategori_id'] == $kategori_id){
			$string .= '<a href="'.BASE_URL.'index.php?kategori_id='.$row['kategori_id'].'" class="btn btn-lg col-md-12 btn-primary active">'.$row["kategori"].'</a>';
		}else{
			$string .= '<a href="'.BASE_URL.'index.php?kategori_id='.$row['kategori_id'].'" class="btn btn-lg col-md-12 btn-primary">'.$row["kategori"].'</a>';
		}
	}
	$string .= "</div>";
	return $string;
}