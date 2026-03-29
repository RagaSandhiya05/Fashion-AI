<?php
$conn = mysqli_connect("localhost","root","","fashion_ai");

if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}
?>