<?php

function showAll($table, $page) {
  include "koneksi.php";
  $query = mysqli_query($connect, "select * from $table");
  while ($data = mysqli_fetch_array($query)) {
    echo $data["name"]." ".$data["person"]." ".$data["duration"];
  }
}

 ?>
