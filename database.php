<?php

// Database connection info
$dbHost = 'localhost';
$dbName = 'todoapp-database';
$dbUser = 'test_dev';
$dbPass = '123456';

// Connect to the database
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}