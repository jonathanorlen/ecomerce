<?php 
	if($user_id){
		header("location:".BASE_URL."index.php");
	}
?>
<div id="container-user-akses">
	<form action="<?php echo BASE_URL.'function/proses_login.php'?>" method="POST">
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif']:false;

			if($notif == "true"){
				echo "<div class='notif'>Maaf , email atau password yang kamu masukan tidak cocok</div>";
			}
		?>
		<div class="element-form">
			<label>Email</label>
			<span>
				<input type="email" name="email" >
			</span>
		</div>
		<div class="element-form">
			<label>Password</label>
			<span>
				<input type="password" name="password">
			</span>
		</div>

		<div class="element-form">
			<span>
				<input type="submit" value="register">
			</span>
		</div>
	</form>
</div>