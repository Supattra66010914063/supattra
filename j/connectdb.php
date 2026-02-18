<?php
$conn = mysqli_connect("localhost", "root", "", "4063db");
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
}
mysqli_query($conn, "SET NAMES utf8"); // ตั้งค่ารองรับภาษาไทย
?>
