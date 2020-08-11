<div>
	<a  class="btn btn-info push-rigth" href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form";?>" class="tombol-action">+ Tambah </a>
</div>

<?php
	$queryKategori = mysqli_query($connection,"SELECT * FROM kategori");

	if(mysqli_num_rows($queryKategori) == 0){
		echo "<h3>Belum ada  kategori</h3>";
	}else{
		echo "<table class='table'>";
		echo "<tr>
				<th>#</th>
				<th>Kategori</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			";
		$no=1;
		while($row = mysqli_fetch_assoc($queryKategori)){
			echo "<tr>
					<td>$no</td>
					<td>$row[kategori]</td>
					<td>$row[status]</td>
					<td>
						<a href='".BASE_URL."index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>
							<button class='btn btn-warning'>
							Edit
							</button>
						</a>
						<a href='".BASE_URL."module/kategori/action.php?button=Delete&kategori_id=$row[kategori_id]'>
							<button class='btn btn-danger'>
							Hapus
							</button>
						</a>
					</td>
			";
			$no++;
		}
		echo "</table>";
	}
?>