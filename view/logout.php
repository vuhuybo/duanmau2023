<?php 
session_start();
unset($_SESSION['uid']);
unset($_SESSION['role']);
unset($_SESSION['user']);
header('location: login.php');