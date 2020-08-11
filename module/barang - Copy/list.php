<div>
	<a  class="btn btn-info push-rigth" href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form";?>" class="tombol-action">+ Tambah </a>
</div>

<?php
	$queryBarang = mysqli_query($connection,"SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id = kategori.kategori_id ORDER BY nama_barang ASC");

	if(mysqli_num_rows($queryBarang) == 0){
		echo "<h3>Belum ada barang</h3>";
	}else{
		echo "<table class='table'>";
		echo "<tr>
				<th>#</th>
				<th>Barang</th>
				<th>Harga</th>
				<th>Kategori</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			";
		$no=1;
		while($row = mysqli_fetch_assoc($queryBarang)){
			echo "<tr>
					<td>$no</td>
					<td>$row[nama_barang]</td>
					<td>".rupiah($row["harga"])."</td>
					<td>$row[kategori]</td>
					<td>$row[status]</td>
					<td>
						<a href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>
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