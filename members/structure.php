<?php
session_start();
if(isset($_SESSION['email']))
 {
require ("../modules/connect.php");    
require ("../modules/redirect.php");
require ("../modules/seo-string.php");
// $memberEmail = $_SESSION['email'];
$content = '';
$pageTitle = '';
$navTitle ='';
$active = '';
$pageHeader = '';
}
else
redirect("./");
?>