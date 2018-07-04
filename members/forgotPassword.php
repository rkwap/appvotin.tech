<?php
// Include config file
require ("../modules/connect.php");
require_once ("../modules/redirect.php");

if(isset($_POST["newForgot"]))
{    
$url = 'http://appvotin.tech/main';
$oldPassword= $_SERVER['REQUEST_URI'];
$oldPassword = str_replace('/main/members/forgotPassword.php?code=','',$oldPassword);   
$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];

if($newPassword == $confirmNewPassword){
 
$newPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Creates a password hash

$queryFetch="UPDATE members SET password='".$newPassword."' where password='".$oldPassword."';";
mysql_query($link,$queryFetch); //mysqli
echo 'Success';
}
else
echo 'Password Do Not Match.';
}
?>

<html>
    <body>
    <form action="" method="post">
        <label>Enter New Password</label>
        <input type="password" name="newPassword" />
        <br>
        <label>Confirm New Password</label>
        <input type="password" name="confirmNewPassword" />
        <br>
        <button type="submit" name="newForgot" class="btn btn-block btn-round">Change Password</button>
    </form>
    </body>
    
</html>