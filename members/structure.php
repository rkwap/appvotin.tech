<?php
session_start();
if(isset($_SESSION['email']))
 {
require ("../modules/connect.php");    
require ("../modules/redirect.php");

$memberEmail = $_SESSION['email'];

$query = "SELECT * FROM members WHERE email = '".$memberEmail."' ;";
$raw_results = mysqli_query($link,$query) or die(mysqli_error());

                if(mysqli_num_rows($raw_results) > 0){ 
                    
                mysqli_num_rows($raw_results);
                $results = mysqli_fetch_array($raw_results);
                    $firstName = $results['firstName'];
                    $lastName = $results['lastName'];
                    $memberProfilePic = $results['profilePic'];
                    $username = $results['username'];
                    if($results['gender'] == 1)
                    $gender = 'Female';
                    else
                    $gender = 'Male';
                        }
$memberName = $firstName.' '.$lastName;
$memberProfilePic = '../images/members/'.$memberProfilePic;
$content = '';
$pageTitle = '';
$navTitle ='';
$active = '';

    $sql = "SELECT admin FROM members WHERE email='".$_SESSION['email']."'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $admin = $row['admin'];
    }
$pageHeader = '';
}
else
redirect("./");
?>