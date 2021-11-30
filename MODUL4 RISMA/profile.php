	<?php 
		include 'layout/header.php'; 

		if(!isset($_SESSION['login'])){
			header('Location:index.php');
		}

		$result = mysqli($koneksi, 'SELECT * FROM users WHERE id="'.$_SESSION['user']['id'].'"') or die(mysqli_error($koneksi));
		$user   = mysqli_fetch_assoc($result);
	?>
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					PROFILE
				</div>
				<div class="card-body">
					<form class="form-signin" method="POST" action="process/profile_update.php">
					<input type="hidden" name="id" value="<?= $user['id'] ?>">
					<?= flashdata('alert_message') ?>

					<div class="form-label-group">
						<label for="inputEmail">Email</label><br>
						<?= $user['email'] ?>
					</div>

					<div class="form-label-group mt-3">
						<label for="inputEmail">Nama Lengkap</label>
						<input type="text" id="inputEmail" name="nama" class="form-control" placeholder="Nama Lengkap..." required value="<?= $user['nama'] ?>">
					</div>

					<div class="form-label-group mt-3">
						<label for="inputEmail">No. Telp</label>
						<input type="number" name="no_hp" id="inputEmail" class="form-control" placeholder="Nomor Handphone..." required value="<?= $user['no_hp'] ?>">
					</div>

					<div class="form-label-group mt-3">
						<label for="inputPassword">Password</label>
						<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password...">
					</div>

					<div class="form-label-group mt-3">
						<label for="inputPassword">Ulangi Password</label>
						<input type="password" name="confirm_password" id="inputPassword" class="form-control" placeholder="Password...">
					</div>

					<div class="form-label-group mt-3">
						<label for="inputPassword">Warna Navbar</label>
						<select class="form-control" name="nav_color">
							<option value="blue-ocean">Blue Ocean</option>
							<option value="dark-boba" <?php if(isset($_COOKIE['nav_color'])){ if($_COOKIE['nav_color'] == 'dark-boba'){ echo "selected='selected'"; } } ?>>Dark Boba</option>
						</select>
					</div>

					<button class="btn btn-primary mt-3" name="submit" type="submit">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include 'layout/footer.php'; ?>