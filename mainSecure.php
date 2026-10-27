<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset();       // clear all session data
    session_destroy();     // destroy the session
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {//if the user has logged in, this page is displayed
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Main</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>

<ul class="navbar">
  <li><a href="login.php">Home</a></li>
  <li><a href="main.php">Main</a></li>
  <li><a href="">Contact</a></li>
</ul>

<p class="successMain">
 Successful login!
</p>
<form action="main.php" method="POST" >
  <button type="submit" name="logout" class="logout">Log out</button>
</form>
</body>
</html>