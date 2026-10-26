<?php
$servername = "10.61.0.237";
$username = "vuln_user";
$password = "vuln_pass";
$dbname = "loginDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>