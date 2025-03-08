<?php
// var url
$base_url = 'http://localhost/SC2upTechShoppingcart';

// var database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'sc2uptechshoppingcart';

// connect db
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_error($conn_err));
$conn_err = "connection failed";



// connect db #1
// $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// check connection
// if (!$conn) {
//     echo die("Connection failed: " . mysqli_connect_error());
// } else {
//     "Connection successfully";
// }



#connect db #2
// $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// Check Connection
// if (!$conn) {
//     error_log("Connection failed: " . mysqli_connect_error(), 0); // บันทึกข้อผิดพลาดลงใน error log
//     die("Connection failed. Please check the log file."); // ไม่โชว์รายละเอียดให้ผู้ใช้เห็น
// } else {
//     error_log("Connection successfully established.", 0); // บันทึกว่าการเชื่อมต่อสำเร็จ
//     echo "Connection successfully";
// }







#connect db #3

// Create Connection
// $conn = mysqli_connect($db_ost, $db_user, $db_pass, $db_name);

// Check Connection
// if (!$conn) {
//     $response = [
//         "status" => "error",
//         "message" => "Database connection failed: " . mysqli_connect_error()
//     ];
//     header('Content-Type: application/json');
//     echo json_encode($response);
//     exit;
// }
// Success Response
// $response = [
//     "status" => "success",
//     "message" => "Connected to the database successfully"
// ];


// header('Content-Type: application/json');
// echo json_encode($response);