<div class="row">
	<div class="col-md-3">
		<?php 
		echo kategori($kategori_id);
		?>
	</div>
	<div class="col-md-9">
		<?php
			$barang_id = $_GET['barang_id'];
			$query = mysqli_query($connection,"SELECT * FROM barang where barang_id='$barang_id' AND status='on'");
			$row = mysqli_fetch_assoc($query);
		?>
		<div class="row">
			<div class="col-md-6">
				<img src="<?php echo BASE_URL.'image/barang/'.$row["gambar"]?>" width="100%">
			</div>
			<div class="col-md-6">
				<h2>
					<?php echo $row["nama_barang"]?>
				</h2>
				<h2>
					<?php echo $row["harga"]?>
				</h2>
				<h2>
					<?php echo $row["stok"]?>
				</h2>
				<button class="btn btn-primary"> + Add To Cart </button>
			</div>
		</div>
		<div class="col-md-12">
			<?php echo $row["spesifikasi"]?>
		</div>
		
	</div>
</div>