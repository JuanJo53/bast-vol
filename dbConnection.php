<?php
$conn = new mysqli("localhost", "root", "", "bast_vol");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error)."<br>";
}
?>