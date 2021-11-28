<?php 

	include '../setting/database.php';
	include '../helper.php';

	if(isset($_POST['submit'])){
		$query = 'SELECT * FROM users WHERE email="'.$_POST['email'].'" AND password="'.$_POST['password'].'"';
	    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
	    
	    if(mysqli_num_rows($result) > 0){
	    	$_SESSION['login'] = true;
	    	$_SESSION['user']  = mysqli_fetch_assoc($result);

	    	if(isset($_POST['remember'])){
	    		setcookie('credential', json_encode($_SESSION['user']), time() + (86400 * 30), '/');
	    	}

	    	set_flashdata(show_alert('Anda berhasil melakukan login', 'success'), $msg);
	    	header('Location:../index.php');

	    }else{
	    	set_flashdata(show_alert('Username / password salah, coba lagi', 'danger'), $msg);
	    	header('Location:../login.php');
	    }

	}

?>