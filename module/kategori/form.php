<?php 
	$kategori_id = isset($_GET['kategori_id'])?$_GET['kategori_id']:false;

	$kategori = "";
	$status = "";
	$button = "Add";

	if($kategori_id){
		$querykategori = mysqli_query($connection,"SELECT * FROM kategori WHERE kategori_id ='$kategori_id'");
		$row = mysqli_fetch_assoc($querykategori);

		$kategori = $row['kategori'];
		$status = $row['status'];
		$button = "Update";
	}
?>
<form action="<?php echo BASE_URL."module/kategori/action.php?kategori_id=$kategori_id";?>" method="POSt">
		<div class="element-form">
			<label>Kategori</label>
			<span><input type="text" name="kategori" value="<?php echo $kategori;?>" /></span>
		</div>
		<div class="element-form">
			<label>Status</label>
			<span>
				<input type="radio" name="status" value="on" <?php if($status == "on"){echo "checked";}?>/>On
				<input type="radio" name="status" value="off" <?php if($status == "off"){echo "checked";}?>/>Off
			<span>
		</div>
		<div class="element-form">
			<span>
				<input type="submit" name="button" value="<?php echo $button?>"/>
			<span>
		</div>
</form>