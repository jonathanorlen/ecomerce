<?php 
	$id = isset($_GET['id'])?$_GET['id']:false;

	$nama = "";
	$email = "";
	$alamat = "";
	$phone = "";
	$status = "";
	$level = "";
	$button = "Add";

	if($id){
		$querykategori = mysqli_query($connection,"SELECT * FROM user WHERE id ='$id'");
		$row = mysqli_fetch_assoc($querykategori);

		$nama = $row["nama"];
		$email = $row["email"];
		$alamat = $row["alamat"];
		$phone = $row["phone"];
		$status = $row["status"];
		$level = $row["level"];
		$button = "Update";
	}
?>
<form action="<?php echo BASE_URL."module/user/action.php?id=$id";?>" method="POSt">
		<div class="element-form">
			<label>Nama</label>
			<span><input type="text" name="nama" value="<?php echo $nama;?>" class="form-control"/></span>
		</div>
		<div class="element-form">
			<label>Email</label>
			<span><input type="text" name="email" value="<?php echo $email;?>" class="form-control"/></span>
		</div>
		<div class="element-form">
			<label>Alamat</label>
			<span><input type="text" name="alamat" value="<?php echo $alamat;?>" class="form-control"/></span>
		</div>
		<div class="element-form">
			<label>Phone</label>
			<span><input type="number" name="phone" value="<?php echo $phone;?>" class="form-control"/></span>
		</div>
		<div class="element-form">
			<label>Level</label>
			<span>
				<input type="radio" name="level" value="admin" <?php if($level == "admin"){echo "checked";}?>/>Admin
				<input type="radio" name="level" value="customer" <?php if($level == "customer"){echo "checked";}?>/>Customer
			<span>
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