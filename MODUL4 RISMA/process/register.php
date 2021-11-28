<?php 

	include '../setting/database.php';
	include '../helper.php';

	$pass = false;
	if(isset($_POST['submit'])){
		if($_POST['password'] == $_POST['confirm_password']){
			$query = 'INSERT INTO users SET nama="'.$_POST['nama'].'", email="'.$_POST['email'].'", password="'.$_POST['password'].'", no_hp="'.$_POST['no_hp'].'"';

		    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
		    
		    if($result){
		    	$pass = true;
		    	$msg  = show_alert('Berhasil melakukan pendaftaran, silahkan login', 'success');
		    }else{
		    	$msg  = show_alert('Terjadi kesalahan, coba lagi nanti', 'danger');
		    }

		}else{
			$msg  = show_alert('Password yang diketikkan tidak sama', 'danger');
		}

	    set_flashdata('alert_message', $msg);
	}

	if($pass){
		header('Location:../login.php');
	}else{
		header('Location:../register.php');
	}

?>