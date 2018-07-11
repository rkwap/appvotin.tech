<?php
require_once("../modules/redirect.php");
session_start();
if(!isset($_SESSION['email']) == $email)
redirect("dashboard.php");
else
redirect("../");


?>