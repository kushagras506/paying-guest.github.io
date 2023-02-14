<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paying Guest Accomodation System|| Owner Signin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="css1/linearicons.css">
	<link rel="stylesheet" href="css1/font-awesome.min.css">
	<link rel="stylesheet" href="css1/nice-select.css">
	<link rel="stylesheet" href="css1/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css1/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css1/bootstrap.css">
	<link rel="stylesheet" href="css11/owl.carousel.css">
	<link rel="stylesheet" href="css2/main.css">
      <link rel="stylesheet" href="st.css">
</head>
<body>

<?php include_once('includes/header1.php');?>

<section>
    <div class="cont1">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="post" id="" name="login">
                    
                    <h2 class="text-center">Paying Guest Owner</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <div class="form-group">
                        <input class="form-control" type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required="true">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" class="form-control" id="password" name="password" placeholder="Password" required="true">
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                    <div class="link login-link text-center"><a href="index.php">Back</a></div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>