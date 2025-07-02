<?php
$connect = mysqli_connect('localhost', 'root', '', 'healthtracker');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>