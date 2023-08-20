<?php

require_once 'env.php';
loadEnv(__DIR__ . '/.env');


$host = $_ENV['host'];
$user  = $_ENV['user'];
$password = $_ENV['password'];
$database = $_ENV['database'];

$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};

?>
