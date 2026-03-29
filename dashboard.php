<?php
session_start();
$conn = new mysqli("localhost","root","","fashion_store");

$username = $_SESSION['user'];

$result = $conn->query("SELECT * FROM measurements WHERE username='$username' ORDER BY created_at DESC LIMIT 1");
$row = $result->fetch_assoc();
?>

<h2>Welcome, <?= $username ?> 👗</h2>

<?php if($row) { ?>
    <h3>Your Latest AI Measurements:</h3>
    <ul style="font-size:20px;">
        <li><b>Bust:</b> <?= $row['bust'] ?> cm</li>
        <li><b>Waist:</b> <?= $row['waist'] ?> cm</li>
        <li><b>Hips:</b> <?= $row['hips'] ?> cm</li>
        <li><b>Height:</b> <?= $row['height'] ?> cm</li>
    </ul>
<?php } else { ?>
    <p>No measurement found. Please scan.</p>
<?php } ?>

<br>
<a href="scan.php" style="padding:15px; background:#ff4081; color:white; text-decoration:none; border-radius:10px;">Start New Scan</a><br><br>

<a href="login.php?logout=true" style="color:red;">Logout</a>
