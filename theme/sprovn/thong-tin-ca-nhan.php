

<?php 

  if (!isset($_SESSION['user_id_gbvn'])) {

    header('location: /dangnhap');

  }

?>

<?php include_once 'template/register/' . "MS_REGISTER_CMS_0005.php"; ?>