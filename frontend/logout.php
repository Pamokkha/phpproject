<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("location: login.php");
}                   

session_destroy();
header("location: index.php");
?>