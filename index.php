<?php
session_start();

// Include functions
include_once 'config.php';
include_once 'include/header.php';
include_once 'include/footer.php';

//Connect to the database using PDO MySQL
$pdo = pdo_connect_mysql();

//Get requested Page
$page = isset($_GET['page']) && file_exists('views/'.$_GET['page'].'.php') ? $_GET['page'] : 'products';
// Include and show the requested page
include 'views/'.$page.'.php';

?>