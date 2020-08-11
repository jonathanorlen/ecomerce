<?php 
	include_once("function/connection.php");
	$barang_id = isset($_GET['barang_id'])?$_GET['barang_id']:false;

	$nama_barang = "";
	$spesifikasi = "";
	$kategori_id = "";
	$stok = "";
	$harga = "";
	$status = "";
	$gambar = "";
	$button = "Add";

	

	if($barang_id){
		$querykategori = mysqli_query($connection,"SELECT * FROM barang WHERE barang_id ='$barang_id'");
		$row = mysqli_fetch_assoc($querykategori);

		$nama_barang = $row["nama_barang"];
		$spesifikasi = $row["spesifikasi"];
		$kategori_id = $row["kategori_id"];
		$stok = $row["stok"];
		$harga = $row["harga"];
		$status = $row['status'];
		$gambar = $row['gambar'];
		$button = "Update";

		$gambar = "<img src='".BASE_URL."image/barang/$gambar' style='width:200px;vertical-align:middle'/>";
	}
?>

<script type="text/javascript" src="<?php echo BASE_URL.'js/ckeditor5/ckeditor.js'?>"></script>
<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id";?>" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Kategori</label>
			<?php echo $kategori_id?>
			<select class="form-control" name="kategori">
				<?php 
					$query = mysqli_query($connection,"SELECT * FROM Kategori WHERE status='on'");
					while($row=mysqli_fetch_array($query)){
						if($row['kategori_id'] == $kategori_id){
							echo "<option value='$row[kategori_id]' selected>$row[kategori]</option>";
						}else{
							echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
						}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Nama Barang</label>
			<input class="form-control" type="text" name="nama_barang" value="<?php echo $nama_barang?>">
		</div>
		<div id="edit">
			
		</div>
		<div class="form-group">
			<label>Spesifikasi</label>
			<textarea class="form-control"  name="spesifikasi" id="editor">
				<?php echo str_replace('&','&amp;',$spesifikasi)?>
			</textarea>
		</div>
		<div class="form-group">
			<label>Stok</label>
			<input class="form-control" type="number" name="stok" value="<?php echo $stok?>">
		</div>
		<div class="form-group">
			<label>Harga</label>
			<input class="form-control" type="number" name="harga" value="<?php echo $harga?>">
		</div>
		<div class="form-group">
			<label>Image</label>
			<?php echo $gambar;?>
			<input class="form-control" type="file" name="file">
		</div>
		<div class="form-group">
			<label>Status</label>
			<input  type="radio" name="status" value="on" <?php if($status == "on"){echo "checked";}?>>On
			<input  type="radio" name="status" value="off" <?php if($status == "off"){echo "checked";}?>>Off
		</div>
		<div class="element-form">
			<span>
				<input type="submit" name="button" value="<?php echo $button?>"/>
			<span>
		</div>

	<script>
		ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
  </script>
</form>