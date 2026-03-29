<?php
$conn = new mysqli("localhost", "root", "", "fashion_store");

$result = $conn->query("SELECT * FROM dress_orders ORDER BY order_id DESC");
echo "<h2>All Orders</h2><table border='1'><tr><th>ID</th><th>Name</th><th>Dress</th><th>Size</th><th>Status</th></tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
      <td>{$row['order_id']}</td>
      <td>{$row['customer_name']}</td>
      <td>{$row['dress_name']}</td>
      <td>{$row['dress_size']}</td>
      <td>{$row['status']}</td>
    </tr>";
}
echo "</table>";
?>
