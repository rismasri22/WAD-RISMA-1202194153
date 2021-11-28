<?php 

	include '../setting/database.php';
	include '../helper.php';

	if(isset($_GET['id'])){
		mysqli_query($koneksi, 'DELETE FROM bookings WHERE id="'.$_GET['id'].'" AND user_id="'.$_SESSION['user']['id'].'"') or die(mysqli_error($koneksi));
		set_flashdata('alert_message', show_alert('Data Booking berhasil dihapus', 'success'));
	}
	
	header('Location:../bookings.php');
?>