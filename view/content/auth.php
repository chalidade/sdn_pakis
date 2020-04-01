<?php
// header('Content-Type: application/json');
error_reporting(0);
include "../../admin/app/config/connection.php";
session_start();

$id                 = $_REQUEST['id'];

if (empty($id)) {
  $email              = $_POST['email'];
  $password           = base64_encode(md5(sha1($_POST['password'])));

  if (is_numeric($email)) {
    $query            = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_user_siswa` as A INNER JOIN `tx_hdr_user` as B ON B.`USER_ID` = A.`DTL_HDR_ID` WHERE A.`DTL_NIS` like '%$email%'");
  } else {
    $query            = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_user` WHERE `USER_EMAIL` like '%$email%'");
  }

  $dataUser           = json_encode(mysqli_fetch_assoc($query));
  $decodeUser         = json_decode($dataUser, TRUE);

  if (empty($decodeUser["USER_PASSWORD"])) {
    $passwordDB       = "123456";
    $passwordDB       = base64_encode(md5(sha1($passwordDB)));
  } else {
    $passwordDB       = base64_encode(md5(sha1($decodeUser["USER_PASSWORD"])));
  }


  if (!empty($dataUser) AND $password == $passwordDB) {
    $_SESSION["USER"] = $dataUser;
    $expired          = base64_encode(date('H:i:s', strtotime('+8 hour')));
    $updateToken      = mysqli_query($mysqli, "UPDATE `tx_hdr_user` SET `USER_TOKEN` = '$expired' WHERE `tx_hdr_user`.`USER_EMAIL` = '$email'");
    echo "<script type='text/javascript'> window.location.href = '../../admin/index.php?id=home'; </script>";
  } else {
    echo "<script type='text/javascript'>alert('Username atau Password Salah'); window.location.href = 'login.php'; </script>";
  }

} else {
  session_start();
  session_destroy();
  echo "<script type='text/javascript'> window.location.href = 'login.php'; </script>";
}

 ?>
