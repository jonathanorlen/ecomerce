<div class="row">
	<div class="col-md-3">
		<!-- <div class="btn-group-vertical col-md-12">
			<?php
			$query = mysqli_query($connection,"SELECT * FROM kategori WHERE status='on'");

			while($row=mysqli_fetch_assoc($query)){
				if($row['kategori_id'] == $kategori_id){
					echo '<a href="'.BASE_URL.'index.php?kategori_id='.$row['kategori_id'].'" class="btn btn-lg col-md-12 btn-primary active">'.$row["kategori"].'</a>';
				}else{
					echo '<a href="'.BASE_URL.'index.php?kategori_id='.$row['kategori_id'].'" class="btn btn-lg col-md-12 btn-primary">'.$row["kategori"].'</a>';
				}
			}
			?>
		</div> -->
		<?php
			echo kategori($kategori_id);
		?>
	</div>
	<style type="text/css">
		
.for_slick_slider{
	display: flex;
}

.slick-dotted.slick-slider {
	margin-bottom:60px !important;
}

.for_slick_slider .items{
	height:auto;
	margin: 10px;
}

.for_slick_slider .items img{
	width: 100%;
	height:auto;
}
	</style>
	<div class="col-md-9">
		<div class="for_slick_slider multiple_item">
			<div class="items">
				<img src="http://placehold.it/350x100?text=1">
			</div>
			<div class="items">
				<img src="http://placehold.it/350x100?text=2">
			</div>
			<div class="items">
				<img src="http://placehold.it/350x100?text=3">
			</div>
			<div class="items">
				<img src="http://placehold.it/350x100?text=4">
			</div>
			<div class="items">
				<img src="http://placehold.it/350x100?text=5">
			</div>
			<div class="items">
				<img src="http://placehold.it/350x100?text=6">
			</div>
		</div>
		
		<div class="row">
			<?php
			if($kategori_id){
				$query = mysqli_query($connection,"SELECT * FROM barang WHERE status='on' AND kategori_id ='$kategori_id' ORDER BY rand() DESC LIMIT 9");
			}else{
				$query = mysqli_query($connection,"SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
			}

			while($row = mysqli_fetch_assoc($query)){
				echo "
				<div class='col-md-4'>
				<div class='card card-mb'>
				<img src='".BASE_URL."image/barang/$row[gambar]' style='width:100%'>
				<div class='card-body'>
				<p>".$row['nama_barang']."</p>
				<p>".rupiah($row['harga'])."</p>
				<span>Stok : $row[stok]</span>
				</div>
				<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]' class='btn btn-info'>
				Add To Cart
				</a>
				</div>
				</div>
				";
			}?>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$(".multiple_item").slick({
			dots:true,
			infinite:true,
			slidesToShow:1,
			slidesToScrolls:1,
			autoplay:true,
			arrows:false,
			autoplay:2000,

		})
	})
</script>