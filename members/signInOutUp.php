<?php
// Include config file
require_once ("../modules/connect.php");
require_once ("../modules/redirect.php");
$url = 'http://appvotin.tech/main';

// Define variables and initialize with empty values
$username = $password = $confirmPassword = $email = "";
$usernameErr = $passwordErr = $confirmPasswordErr = $emailErr = "";

############  Signout Code #####
if(isset($_POST["signout"])){
session_start();
session_unset();
session_destroy();
redirect($url);
}
#####
#### forgot password request ###
if(isset($_POST["forgot"]))
{
    $email = $_POST['email'];
    $queryFetch="SELECT * FROM members where email='".$email."';";
    $results = mysqli_query($link,$queryFetch);
    if($results > 0)
    {
    while ($row = mysqli_fetch_array($results)) {
    //fetching and storing parameters in variables
    $password = $row['password'];
        }
    
    ##### Email Verification Process (Sending Mail for Verification) ###
                
    // Declaring Email Parameters
    $memberName = $firstName.' '.$lastName; // member name
    $fromEmail = 'noreply@appvotin.tech'; // sender's email
    $fromName = 'AppVotin Team'; // sender's name
    $rEmail = $email; // Reciptent Email
    $rName = $memberName; // Reciptent Name
    $subject = "Password Recovery. AppVotin.tech";
    $message = "<html></body><div><div>Dear $memberName,</div></br></br>" ; // email content(message)
    $message.= "<div style='padding-top:8px;'>
                            Please click The following link to change your password!
                            </div>
                            <div style='padding-top:10px;'>
                            <a href='http://www.appvotin.tech/main/members/forgotPassword.php?code=$password'>
                            Click Here</a></div>
                            </div></body></html>";
                
    // Sending Confirmation E-Mail
    require_once ("../modules/sendMail.php"); // Requiring sendmail.php (based on PHPMailer)
                
    echo "<script>alert('An E-mail to recover your password is sent to you.
    Check your email for furthur process.');</script>";
    }
    else{
    echo "<script>alert('Email Does not Exists. Please enter a valid email address.);</script>";}
    #########
}

######

############  Login Form #####
if(isset($_POST["login"])){
// Check if Email is empty
        if(empty(trim($_POST["email"]))){

            $emailErr = 'Please enter email.';

        } else{

            $email = trim($_POST["email"]);

        }
        // Check if password is empty
        if(empty(trim($_POST['password']))){
            $passwordErr = 'Please enter your password.';
        } else{
            $password = trim($_POST['password']);
        }
        // Validate credentials
        if(empty($emailErr) && empty($passwordErr)){
            // Prepare a select statement
            $sql = "SELECT email, password FROM members WHERE email = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $paramEmail);
                // Set parameters
                $paramEmail = $email;
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    // Check if email exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $email, $hashedPassword);

                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashedPassword)){
                                /* Password is correct, so start a new session and

                                save the email to the session */
                                session_start();

                                $_SESSION['email'] = $email;      

                                redirect($url);

                            } else{
                                // Display an error message if password is not valid
                                $passwordErr = 'The password you entered was not valid.';
                            }
                        }
                    } else{
                        // Display an error message if email doesn't exist
                        $emailErr = 'No account found with that email.';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
        // Close connection
        mysqli_close($link);
    }


########## Sign Up Form ###


// Processing form data when signup form is submitted

if(isset($_POST["signup"])){
    

        // Validate username
            // Prepare a select statement

            $sql = "SELECT id FROM members WHERE username = ?";

            if($stmt = mysqli_prepare($link, $sql)){

                // Bind variables to the prepared statement as parameters

                mysqli_stmt_bind_param($stmt, "s", $paramUsername);

                

                // Set parameters

                $paramUsername = trim($_POST["username"]);

                

                // Attempt to execute the prepared statement

                if(mysqli_stmt_execute($stmt)){

                    /* store result */

                    mysqli_stmt_store_result($stmt);

                    

                    if(mysqli_stmt_num_rows($stmt) == 1){

                        $usernameErr = "This username is already taken.";

                    } else{

                        $username = trim($_POST["username"]);

                    }

                } else{

                    echo "Oops! Something went wrong. Please try again later.";

                }

            }

             

            // Close statement

            mysqli_stmt_close($stmt);

        
        #######
        
        
        
      // Validate email
        

            // Prepare a select statement

            $sql = "SELECT id FROM members WHERE email = ?";

            if($stmt = mysqli_prepare($link, $sql)){

                // Bind variables to the prepared statement as parameters

                mysqli_stmt_bind_param($stmt, "s", $paramEmail);

                

                // Set parameters

                $paramEmail = trim($_POST["email"]);

                

                // Attempt to execute the prepared statement

                if(mysqli_stmt_execute($stmt)){

                    /* store result */

                    mysqli_stmt_store_result($stmt);

                    

                    if(mysqli_stmt_num_rows($stmt) == 1){

                        $emailErr = "An Account is already associated with this email.";

                    } else{

                        $email = trim($_POST["email"]);

                    }

                } else{

                    echo "Oops! Something went wrong. Please try again later.";

                }

            }

             

            // Close statement

            mysqli_stmt_close($stmt);

         
        
        
        
         
        
        
##########
        // Validate password

        if(strlen(trim($_POST['password'])) < 6){

            $passwordErr = "Password must have atleast 6 characters.";

        } else{

            $password = trim($_POST['password']);

        }

        

        // Validate confirm password
        
            $confirmPassword = trim($_POST['confirmPassword']);

            if($password != $confirmPassword){

                $confirmPasswordErr = 'Password did not match.';

            }


#####  Profile Pic Upload ####### 
$targetDir = "../images/members/";
$targetFile = $_POST['username'].'.jpg';
$targetPath= $targetDir.$targetFile;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        redirect($url);
        break;
        
    }

// Check file size
if ($_FILES["profilePic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    redirect($url);
    break;
    
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
    $uploadOk = 0;
    redirect($url);
    break;
    
}
        
#################      

        // Check input errors before inserting in database

        if(empty($usernameErr) && empty($passwordErr) && empty($emailErr) && empty($confirmPasswordErr && $uploadOk == 1)){


// upload image 
if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetPath)) {
    echo '';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
//


            // Prepare an insert statement

            $sql = "INSERT INTO membersVerify (username, password, email, gender, firstName, lastName, profilePic, activationCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

             
            $firstName= $_POST['firstName'];
            $lastName= $_POST['lastName'];
            $gender= $_POST['gender'];
            $profilePic = $targetFile;
            $activationCode=password_hash($email.time(), PASSWORD_DEFAULT);

            if($stmt = mysqli_prepare($link, $sql)){

                // Bind variables to the prepared statement as parameters

                mysqli_stmt_bind_param($stmt, "ssssssss", $paramUsername, $paramPassword, $paramEmail, $gender, $firstName, $lastName, $profilePic, $activationCode);
                // Set parameters

                $paramUsername = $username;
                $paramEmail = $email;
                $paramPassword = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                

                // Attempt to execute the prepared statement

                if(mysqli_stmt_execute($stmt)){

                ##### Email Verification Process (Sending Mail for Verification) ###
                
                // Declaring Email Parameters
                $memberName = $firstName.' '.$lastName; // member name
                $fromEmail = 'noreply@appvotin.tech'; // sender's email
                $fromName = 'AppVotin Team'; // sender's name
                $rEmail = $email; // Reciptent Email
                $rName = $memberName; // Reciptent Name
                $subject = "Please Confirm You Account! AppVotin.tech";
                $message = "<html></body><div><div>Dear $memberName,</div></br></br>" ; // email content(message)
                $message.= "<div style='padding-top:8px;'>
                            Please click The following link For verifying and activation of your account
                            </div>
                            <div style='padding-top:10px;'>
                            <a href='http://www.appvotin.tech/main/members/verifyEmail.php?activationCode=$activationCode'>
                            Click Here</a></div>
                            </div></body></html>";
                
                // Sending Confirmation E-Mail
                require_once ("../modules/sendMail.php"); // Requiring sendmail.php (based on PHPMailer)
                
                echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";
                #########

                // Redirect to login page
                redirect($url);
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
        // Close connection
        mysqli_close($link);
    }
    ?>