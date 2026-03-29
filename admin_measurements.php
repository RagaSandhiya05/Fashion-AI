<?php
$conn = new mysqli("localhost","root","","fashion_store");
$result = $conn->query("SELECT * FROM measurements ORDER BY created_at DESC");
?>

<h2>All User Measurements</h2>

<table border="1" cellpadding="10">
<tr>
<th>Username</th>
<th>Bust</th>
<th>Waist</th>
<th>Hips</th>
<th>Height</th>
<th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?= $row['username'] ?></td>
<td><?= $row['bust'] ?></td>
<td><?= $row['waist'] ?></td>
<td><?= $row['hips'] ?></td>
<td><?= $row['height'] ?></td>
<td><?= $row['created_at'] ?></td>
</tr>
<?php } ?>

</table>
