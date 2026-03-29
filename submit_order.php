<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "fashion_store";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$dress_name = $_POST['dress_name'];
$dress_size = $_POST['dress_size'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO dress_orders (customer_name, email, phone, address, dress_name, dress_size, quantity)
        VALUES ('$name', '$email', '$phone', '$address', '$dress_name', '$dress_size', $quantity)";

if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
