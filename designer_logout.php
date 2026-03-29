<?php
session_start();
session_destroy();
echo "<script>alert('Designer logged out'); window.location.href='designer_login.php';</script>";
exit();
?>
