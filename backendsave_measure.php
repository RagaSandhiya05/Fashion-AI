<?php
$conn = new mysqli("localhost", "root", "", "fashion_ai");

if ($conn->connect_error) {
    die("DB connection failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$height = $_POST['height'];
$bust = $_POST['bust'];
$waist = $_POST['waist'];
$hips = $_POST['hips'];
$shoulder = $_POST['shoulder'];
$sleeve = $_POST['sleeve'];

$sql = "INSERT INTO measurements 
(name,email,height,bust,waist,hips,shoulder,sleeve)
VALUES (?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiiiiii",
    $name,$email,$height,$bust,$waist,$hips,$shoulder,$sleeve
);

$stmt->execute();

echo "<script>alert('Measurements saved successfully');window.location='../index.html';</script>";
?>
