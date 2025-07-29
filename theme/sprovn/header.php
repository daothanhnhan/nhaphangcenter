<?php 
	function getUser () {
		global $conn_vn;
		$sql = "SELECT * FROM user WHERE id = ".$_SESSION['user_id_gbvn'];
		$result = mysqli_query($conn_vn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
?>
<?php include_once DIR_HEADER."MS_HEADER_SPRO_0001.php";  ?>
