<?php 
	include '../setting/database.php';
	include '../helper.php';

	if(isset($_POST['submit'])){
		$id    = $_POST['id'];

		if($_POST['password'] == $_POST['confirm_password']){
			if($_POST['password'] != ''){
				$query = 'UPDATE users SET nama="'.$_POST['nama'].'", no_hp="'.$_POST['no_hp'].'", password="'.$_POST['password'].'" WHERE id="'.$id.'"';
			}else{
				$query = 'UPDATE users SET nama="'.$_POST['nama'].'", no_hp="'.$_POST['no_hp'].'" WHERE id="'.$id.'"';
			}
			
		    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
		    
		    if($result){
		    	$_SESSION['user']['nama'] = $_POST['nama']; 
		    	setcookie('nav_color', $_POST['nav_color'], time() + (86400 * 60), '/');
		    	$msg = show_alert('Profile berhasil diubah', 'success');

		    }else{
		    	$msg = show_alert('Terjadi kesalahan, coba lagi nanti', 'danger');
		    }

		}else{
			$msg = show_alert('Password tidak sama', 'danger');
		}

		set_flashdata('alert_message', $msg);
	}

	header('Location:../profile.php');
?>