<?php

require 'connectDB.php';

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

$sql = "SELECT * FROM users WHERE NOT username='' ORDER BY id DESC";
$result = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($result, $sql)) {
    echo '<p class="error">SQL Error</p>';
} else {
    mysqli_stmt_execute($result);
    $resultl = mysqli_stmt_get_result($result);
}

echo json_encode(mysqli_fetch_all($resultl, MYSQLI_ASSOC));
