<?php

require 'connectDB.php';

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");


$json = file_get_contents('php://input');
$data = json_decode($json);

if(isset($data->selected_date)){
  $seldate = $data->selected_date;
}
else{
  $seldate = date('Y-m-d');
}


$sql = "SELECT * FROM users_logs WHERE checkindate='$seldate' ORDER BY id DESC";
$result = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($result, $sql)) {
  echo json_encode('<p class="error">SQL Error</p>');
} else {
  mysqli_stmt_execute($result);
  $resultl = mysqli_stmt_get_result($result);
  echo json_encode(mysqli_fetch_all($resultl, MYSQLI_ASSOC));
}
