<?php
session_start();

function secure(){
    if(!isset($_SESSION['id'])){
        header('location: login.php');
        die();
    }
}
?>