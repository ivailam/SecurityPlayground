<?php
session_start(); 
include "connect.php";

$message = "";   // Stores the message displayed to the user
$css_class = ""; // Stores the CSS class used to style the message

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  // Retrieve the username and password submitted through the login form
$username = $_POST["username"]; 
$password = $_POST["password"];
 
// Prepare a parameterised SQL query to check the submitted credentials
$sql = "SELECT * FROM users WHERE username = ? AND password = ?"; 
$stmt = $conn->prepare($sql);

// Bind the submitted credentials to the query parameters
$stmt->bind_param("ss", $username, $password);//add the inputed credentials to the query
$stmt->execute();

// Retrieve the query results
$result = $stmt->get_result();

 // If a matching user is found, mark the session as logged in and redirect
if ($result->num_rows > 0) 
    { 
      $_SESSION['logged_in'] = true;
       header("Location: main.php");
       exit;        
    } 
else // If no matching user is found, display an error message
    {
        $message = "Invalid username or password.";
        $css_class = "error";
    } 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>

<ul class="navbar">
  <li><a href="login.php">Home</a></li>
  <li><a href="main.php">Main</a></li>
  <li><a href="">Contact</a></li>
</ul>

<form action="login.php" method="POST" class="form">
  <div class="Login">
    <p>Log in</p>
  </div>

   <?php if ($message): ?>
        <div class="message <?= $css_class ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

  <div class="container">
    <label for="uname"><b>Username:</b></label>
    <input type="text" placeholder="Enter username" name="username" required>

    <label for="psw"><b>Password:</b></label>
    <input type="password" placeholder="Enter password" name="password" required>

    <button type="submit" class="login-btn">Log in</button>
</form>

</body>
</html>