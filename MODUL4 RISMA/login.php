<?php include 'layout/header.php'; ?>

<div class="row mt-5">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="card shadow">
			<div class="card-body">
				<form class="form-signin" method="POST" action="process/login.php">
				  <div class="text-center mb-4">
				    <h1 class="h3 mb-3 mt-3">LOGIN</h1>
				  </div>

				  <hr>

				  <?= flashdata('alert_message') ?>

				  <?php 

				  	$email = $pass = '';
				  	if(isset($_COOKIE['credential'])){
				  		$c = json_decode($_COOKIE['credential'], true);
				  		$email = $c['email'];
				  		$pass  = $c['password'];
				  	}
				  ?>

				  <div class="form-label-group">
				  	<label for="inputEmail">Email address</label>
				    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus value="<?= $email ?>">
				  </div>

				  <div class="form-label-group mt-3">
				  	<label for="inputPassword">Password</label>
				    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required value="<?= $pass ?>">
				  </div>

				  <div class="checkbox mt-3 mb-3">
				    <label>
				      <input type="checkbox" value="1" name="remember"> Remember me
				    </label>
				  </div>
				  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>
				  <p class="text-center mt-3">Anda belum punya akun ?, <a href='register.php'><b>Register</b></a></p>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'layout/footer.php'; ?>