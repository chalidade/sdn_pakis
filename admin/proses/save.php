<?php

 function save($input, $table, $page) {
  include "koneksi.php";
  // Inisialisasi
    $list         = mysqli_query($connect, "SELECT * FROM `list` WHERE `table` = '$table'");
    while ($data  = mysqli_fetch_array($list)) $key[] = "`".$data["field"]."`";
    $keyStr       = implode(", ",$key);
    $value        = implode(", ", $input);

    // echo $value;
    // Insert
    if ($input[0] == "''") {
      $query      = "INSERT INTO `$table` (`id`, $keyStr) VALUES ($value)";
      // echo $query;
      if ($connect->query($query) === TRUE) {
        $last_id = $connect->insert_id;
        uploadPhoto($_FILES["photo"], $last_id, $table);
      } else {
          echo $connect->error;
      }
      $connect->close();
    }

    // Update
     else {
      echo "update";
    }
    if ($page == "contacus") {
      echo "<script>alert('Data Berhasil Disimpan');window.location = '../../$page.php';</script>";
    } else {
      echo "<script>alert('Data Berhasil Disimpan');window.location = '../home.php?id=$page';</script>";
    }
 }

  function uploadPhoto($photo, $id, $table) {
   include "koneksi.php";

   $target_dir = "image/package/";
   $target_file = $target_dir . basename($photo["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // Check if file already exists
   if (file_exists($target_file)) {
       // echo "Sorry, file already exists.";
       $uploadOk = 0;
   }
   // Allow certain file formats
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
       // echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
       $uploadOk = 0;
   }
   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
       // echo "<script>alert('Sorry, your file was not uploaded.')</script>";
   // if everything is ok, try to upload file
   } else {
       if (move_uploaded_file($photo["tmp_name"], $target_file)) {
           // echo "The file ". basename( $photo["name"]). " has been uploaded.";
       } else {
           // echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
       }
   }

   $query = mysqli_query($connect, "UPDATE `$table` SET `photo` = '$target_file' WHERE `$table`.`id` = '$id'");
  }

 ?>
