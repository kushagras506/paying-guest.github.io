<?php 
session_start();
error_reporting(0);
include("includes/dbconnection.php");
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobno = mysqli_real_escape_string($con, $_POST['mobilenumber']);
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);
    if($password !== $cpassword){
        $errors['Password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM tbluser WHERE Email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['Email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $code = rand(999999, 111111);
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: kushagras506@gmail.com Paying Guest Accomodation";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php?temp='.md5($code).'&name='.$name.'&email='.$email.'&mobno='.$mobno.'&pass='.$password);
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        
    }

}




    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = md5($_POST['otp']);
        $code=$_GET['temp'];
        $name=$_GET['name'];
        $email=$_GET['email'];
        $mobno=$_GET['mobno'];
        $password=$_GET['pass'];
        if($code == $otp_code){
            $insert_data = "INSERT INTO tbluser (Fullname, Email, mobilenumber, Password, code, status)
                        values('$name', '$email', '$mobno', '$password', '$code', 'verified')";
            $data_check = mysqli_query($con, $insert_data);
            if($data_check){
                $info = "You are Registered Successfully.";
                $_SESSION['info'] = $info;
                $_SESSION['FullNameame'] = $name;
                $_SESSION['Email'] = $email;
                header('location: signup-successfully.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while inserting data!";
            }
        }else{
            $errors['otp-error'] ="Otp code:". $otp_code."Code : ".$code;
        }
    }


    //if user click login button
    if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select  ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['pgasuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM tbluser WHERE Email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE tbluser SET code = $code WHERE Email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: kushagras506@gmail.com Paying Guest Accomodation";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your Email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['Email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM tbluser WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['Email'];
            $_SESSION['Email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

   //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password=md5($_POST['password']);
        $cpassword=md5($_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 6;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE tbluser SET code = $code, password = '$password' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        } 
    } 
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>