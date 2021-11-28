<?php 
	include '../helper.php';
	session_start();
	session_destroy();

	set_flashdata('alert_message', show_alert('Anda berhasil melakukan logout', 'success'));
	header('Location:../index.php');

?>