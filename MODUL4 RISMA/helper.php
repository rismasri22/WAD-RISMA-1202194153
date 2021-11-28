<?php 
	function show_alert($msg, $status){
		return '<div class="alert alert-'.$status.' alert-dismissible fade show" role="alert">
				  '.$msg.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
	}

	function set_flashdata($name, $msg){
		$_SESSION[$name] = $msg;
	}

	function flashdata($name){
		if(isset($_SESSION[$name])){
			$flashdata = $_SESSION[$name];
			unset($_SESSION[$name]);

			return $flashdata;
		}

		return false;
	}

?>