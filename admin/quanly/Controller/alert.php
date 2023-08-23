<?php 
	/**
	 * 
	 */
	class alert_func
	{
		
		public function alert_error($msg)
		{
			echo "<script>";
			echo "Swal.fire({
					  icon: 'error',
					  text: '".$msg."',
					})";
			echo "</script>";
		}

		public function alert_susses($msg)
		{
			echo "<script>";
			echo "Swal.fire({
					  icon: 'success',
					  text: '".$msg."',
					})";
			echo "</script>";
		}
	}
	
 ?>