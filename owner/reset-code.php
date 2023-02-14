<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paying Guest Accomodation System|| Code Verification</title>
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
                <form action="reset-code.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
                    </div>
                    <div class="link login-link text-center"><a href="forgot-password.php">Back</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>