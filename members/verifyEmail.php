<?php
// Include config file
require ("../modules/connect.php");
require_once ("../modules/redirect.php");
$url = 'http://appvotin.tech/main';

$activationCode= $_SERVER['REQUEST_URI'];
$activationCode = str_replace('/main/members/verifyEmail.php?activationCode=','',$activationCode);
$queryFetch="SELECT * FROM members_verify where activationCode='".$activationCode."';";
$results = mysqli_query($link,$queryFetch);
while ($row = mysqli_fetch_array($results)) {
//fetching and storing parameters in variables
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];
$gender = $row['gender'];
$firstName= $row['firstName'];
$lastName = $row['lastName'];
$profilePic = $row['profilePic'];
$activationCodeFetch = $row['activationCode'];
}

########## Sign Up Form ###
// Processing form data when signup form is submitted

// // upload image 
// if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetPath)) {
//     echo '';
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// //

if ( $activationCode== $activationCodeFetch )


{
            // Prepare an insert statement
            $sql = "INSERT INTO members (username, password, email, gender, firstName, lastName, profilePic) VALUES (?, ?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "sssssss", $username, $password, $email, $gender, $firstName, $lastName, $profilePic);
              
            // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    
                    $queryDelete="DELETE FROM members_verify where activationCode='".$activationCode."';";
                    mysqli_query($link,$queryDelete);
                    echo 'Success!!!';
                    redirect($url);
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        // Close connection
        mysqli_close($link);

        
}

else 
{
echo  "Sorry, the page doesn't exists ";
}
?>