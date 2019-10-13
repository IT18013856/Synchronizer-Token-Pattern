<?php
$conn = new mysqli("localhost", "root", "", "csrf");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} // end if
?>