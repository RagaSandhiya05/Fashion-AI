<?php
require_once "db1.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $dress = $_POST['dress_type'];
  $size = $_POST['size'];
  $qty = $_POST['quantity'];
  $address = $_POST['address'];

  $sql = "INSERT INTO orders 
          (name, phone, email, dress_type, size, quantity, address)
          VALUES (?,?,?,?,?,?,?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssis", $name, $phone, $email, $dress, $size, $qty, $address);

  if ($stmt->execute()) {
    echo "<h2>✅ Order placed successfully!</h2>";
    echo "<a href='order.html'>Place Another Order</a>";
  } else {
    echo "❌ Error placing order";
  }
}
?>
