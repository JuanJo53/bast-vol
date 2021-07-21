<?php
$conn = new mysqli("localhost", "root", "", "bastvol");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error)."<br>";
}
?>