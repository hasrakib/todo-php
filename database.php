<?php


$dbHost = 'localhost';
$dbName = 'todoapp-database';
$dbUser = '';
$dbPass = '';


$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}