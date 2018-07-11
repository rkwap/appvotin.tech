<?php
include("config.php");
$link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
?>