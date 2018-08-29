<?php
include("./structure.php");
$pageTitle .= "Dashboard - AppVotin";
$navTitle .= $_SESSION['username'].": Dashboard";
$active .= $activeDashboard = 'active';
$content .= 'hello';

$pageHeader .= include ("../modules/pageHeaders/membersHeader.php"); 
?>