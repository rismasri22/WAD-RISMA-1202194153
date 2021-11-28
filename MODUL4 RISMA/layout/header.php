<?php 
	include 'setting/database.php'; 
	include 'helper.php'; 
	include 'setting/master_data_wisata.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

	<style type="text/css">
		html {
		  position: relative;
		  min-height: 100%;
		}
		body {
		  margin-bottom: 60px; /* Margin bottom by footer height */
		}
		.footer {
		  position: absolute;
		  bottom: 0;
		  width: 100%;
		  height: 60px; /* Set the fixed height of the footer here */
		  line-height: 60px; /* Vertically center the text there */
		  background-color: #f5f5f5;
		}

	</style>
</head>
<body>

<?php $color = '#63b9db';
		if(isset($_COOKIE['nav_color'])){
			if($_COOKIE['nav_color'] == 'dark-boba'){
				$color = '#361212';
			}
		} ?>

	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:<?= $color ?>">
	  <a class="navbar-brand" href="#"><b>EAD</b> TRAVEL</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link ml-5" href="index.php">Home</a>
	      </li>
	    </ul>
	    <span class="navbar-text">
	    	<?php if(isset($_SESSION['login'])){ ?>
	    			<li class="dropdown mr-5" style="list-style-type: none;">
				        <a style="text-decoration: none" class="dropdown-toggle mr-5" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        	<?= $_SESSION['user']['nama'] ?>
				        </a>
				        <div class="dropdown-menu mr-5" aria-labelledby="dropdown01">
				          <a style="color: #444" class="dropdown-item" href="profile.php"><i></i> Profile</a>
				          <a style="color: #444" class="dropdown-item" href="bookings.php">Daftar Booking</a>
				          <a style="color: #444" class="dropdown-item" href="process/logout.php">Logout</a>
				        </div>
				    </li>

	    	<?php }else{ ?>
	    			<a href="login.php">Login</a> &emsp;
	      			<a href="register.php">Register</a>
	    	<?php } ?>
	    	
	    </span>
	  </div>
	</nav>

	<div class="container mt-4">
		<div class="container login-container">