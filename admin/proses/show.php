<?php

function showAll($json) {
  include "koneksi.php";
  $data   = json_decode($json);
  $table  = "select * from $data->table";

  // if (isset($data->where)) {
  //   $order = $data->orderby;
  //   $table = $table." ORDER BY ".$order[0]." ".$order[1];
  // }

  if (isset($data->orderby)) {
    $order = $data->orderby;
    $table = $table." ORDER BY ".$order[0]." ".$order[1];
  }

  if (isset($data->start)) {
    $table  = $table." LIMIT $data->start, 50";
  }

  $result = $mysqli->query($table);
  if ($result) {
      while($row = $result->fetch_array(MYSQLI_ASSOC)) {
              $myArray[] = $row;
      }
      $data = json_encode($myArray);
      return $data;
  }

}

function countAll($json) {
  $data = json_decode($json);
  include "koneksi.php";
  if ($result = $mysqli->query("select count(*) as total from $data->table")) {
      while($row = $result->fetch_array(MYSQLI_ASSOC)) {
              $myArray[] = $row;
      }
      $data = json_encode($myArray);
      return $data;
  }
}

 ?>
