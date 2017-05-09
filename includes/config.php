<?php
include('classes/user.php');

ob_start();
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_TABLE', 'authsystem');

try {
  $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_TABLE, DB_USER, DB_PASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Exception
} catch (Exception $e) {
  echo '<p>'.$e->getMessage().'</p>';
  exit;
}

$user = new User($db);
