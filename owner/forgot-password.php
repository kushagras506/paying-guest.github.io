<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  


    <link rel="stylesheet" href="css1/linearicons.css">
	<link rel="stylesheet" href="css1/font-awesome.min.css">
	<link rel="stylesheet" href="css1/nice-select.css">
	<link rel="stylesheet" href="css1/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css1/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css1/bootstrap.css">
	<link rel="stylesheet" href="css1/owl.carousel.css">
	<link rel="stylesheet" href="css1/main.css">
	<link rel="stylesheet" href="st.css">







</head>
<body>


<?php include_once('includes/header1.php');?>

    <div class="cont1">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                    <div class="link login-link text-center"><a href="login-user.php">Back</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>