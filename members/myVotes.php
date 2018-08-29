<?php
include("./structure.php");
$pageTitle .= "Dashboard - AppVotin";
$navTitle .= $_SESSION['username'].": My Votes";
$active .= $activeMyVotes = 'active';


$pageHeader .= include ("../modules/pageHeaders/membersHeader.php"); 

$content .= 'hello';
?>