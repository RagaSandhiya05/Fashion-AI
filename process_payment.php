<?php
include "db1.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $order_id = $_POST['order_id'];
    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $amount   = $_POST['amount'];
    $card     = $_POST['card'];

    $card_last4 = substr(preg_replace('/\D/', '', $card), -4);

    $sql = "INSERT INTO payments 
            (order_id, first_name, last_name, amount, card_last4)
            VALUES 
            ('$order_id','$fname','$lname','$amount','$card_last4')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2 style='color:green;text-align:center'>
              Payment Successful  Thank you for shopping!
              </h2>";
    } else {
        echo "DB Error: " . mysqli_error($conn);
    }
}
?>