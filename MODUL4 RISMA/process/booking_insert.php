<?php 

	include '../setting/database.php';
	include '../helper.php';
	include '../setting/master_data_wisata.php';

	if(isset($_SESSION['login'])){
		if(isset($_GET['id'])){
			$id = $_GET['id'];

		    $result = mysqli_query($koneksi, "INSERT INTO bookings SET user_id='".$_SESSION['user']['id']."', nama_tempat='".WISATA[$id]['nama_tempat']."', lokasi='".WISATA[$id]['lokasi']."', harga='".WISATA[$id]['harga']."', tanggal='".$_POST['tanggal_perjalanan']."'") or die(mysqli_error($koneksi));
		    
		    if($result){
		    	$msg  = show_alert('Berhasil melakukan pemesanan', 'success');
		    	$to   = 'bookings.php';
		    }else{
		    	$msg  = show_alert('Terjadi kesalahan, coba lagi nanti', 'danger');
		    	$to   = 'index.php';
		    }

		}else{
			$msg  = show_alert('ID Tiket tidak diketahui', 'danger');
			$to   = 'index.php';
		}

		set_flashdata('alert_message', $msg);
		header('Location:../'.$to);

	}else{
		set_flashdata('alert_message', show_alert('Anda harus login untuk menambahkan booking', 'danger'));
		header('Location:../login.php');
	}
	
?>