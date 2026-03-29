<?php
session_start();

// Destroy session
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ffe6f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .message-box {
            background: white;
            padding: 30px;
            width: 350px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            animation: fadeIn 0.6s ease-in-out;
        }

        .message-box h2 {
            color: #ff3b93;
            margin-bottom: 10px;
        }

        .message-box p {
            color: #444;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background: #ff3b93;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 16px;
        }

        .btn:hover {
            background: #d61f74;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>

<div class="message-box">
    <h2>👋 Logged Out</h2>
    <p>You have successfully logged out of your account.</p>
    <a href="login.html" class="btn">Login Again</a>
</div>

</body>
</html>
