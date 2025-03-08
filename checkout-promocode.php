<?php
session_start();
include 'config.php';

$query = mysqli_query($conn, "INSERT INTO orders (promo_code) VALUES('{$_POST['promo_code']}')") or die('query failed');
