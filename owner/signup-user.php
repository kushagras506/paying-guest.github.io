<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Paying Guest Accomodation System|| Owner Signup</title>
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


<section>
    <div class="cont1">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">PG Owner Registration </h2>
                   
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" maxlength="10" pattern="[0-9]{10}" required="<?php echo $mobno ?>">
							</div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                       
                    </div>
        
                    <div class="form-group">
                        <h5>
                    <input type="checkbox"  required="true" /> I agree to the Terms of Service and Privacy Policy</h5>
                       
                    </div>
            

                    <div class="clearfix">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
                
            </div>
        </div>
    </div>
    </section>
</body>
</html>