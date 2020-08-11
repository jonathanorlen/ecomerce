<div>
	<a  class="btn btn-info push-rigth" href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form";?>" class="tombol-action">+ Tambah </a>
</div>

<?php
	$querykota = mysqli_query($connection,"SELECT * FROM kota");

	if(mysqli_num_rows($querykota) == 0){
		echo "<h3>Belum ada  kota</h3>";
	}else{
		echo "<table class='table'>";
		echo "<tr>
				<th>#</th>
				<th>Kota</th>
				<th>Tarif</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			";
		$no=1;
		while($row = mysqli_fetch_assoc($querykota)){
			echo "<tr>
					<td>$no</td>
					<td>$row[kota]</td>
					<td>".rupiah($row["tarif"])."</td>
					<td>$row[status]</td>
					<td>
						<a href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$row[kota_id]'>
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