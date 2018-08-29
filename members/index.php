<?php
require_once("../modules/redirect.php");
session_start();
if(!empty($_SESSION['email']))
redirect("dashboard.php");
else
redirect("/");
?>