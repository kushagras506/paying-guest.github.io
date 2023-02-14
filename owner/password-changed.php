<?php require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
            <div class="col-md-4 offset-md-4 form login-form">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="login-user.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>