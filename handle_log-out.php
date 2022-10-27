<?php
/*if(isset($_SESSION['user'])){
    session_destroy();
}header('Location:index.php');
die();

session_destroy();
header('Location:index.php');
die();*/
session_start();
unset($_SESSION);
session_destroy();
header('Location:index.php');

?>