<div>
	<a  class="btn btn-info push-rigth" href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=form";?>" class="tombol-action">+ Tambah </a>
</div>

<?php
	$queryKategori = mysqli_query($connection,"SELECT * FROM user");

	if(mysqli_num_rows($queryKategori) == 0){
		echo "<h3>Belum ada user</h3>";
	}else{
		echo "<table class='table'>";
		echo "<tr>
				<th>#</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Level</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			";
		$no=1;
		while($row = mysqli_fetch_assoc($queryKategori)){
			echo "<tr>
					<td>$no</td>
					<td>$row[nama]</td>
					<td>$row[email]</td>
					<td>$row[phone]</td>
					<td>$row[level]</td>
					<td>$row[status]</td>
					<td>
						<a href='".BASE_URL."index.php?page=my_profile&module=user&action=form&id=$row[id]'>
							<button class='btn btn-warning'>
							Edit
							</button>
						</a>
					</td>
			";
			$no++;
		}
		echo "</table>";
	}
?>