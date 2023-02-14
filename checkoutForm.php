<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Pay Page</title>
</head>
<body>
  <div class="container">
<div class="text-center">
<img class="text-center" style="width:100px;" src="./img/logo6.png" alt="">

</div>

  <?php
 $bookid=intval($_GET['bkid']);
$ret=mysqli_query($con,"select * from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where tblbookpg.ID='$bookid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
    <h5 class="my-4 text-center">Checkout For: <?php echo $row['PGTitle'];?></h5>
    <form action="./charge.php" method="post" id="payment-form">
      <div class="form-row w-50 m-auto">

       <input type="text"  name="bookid" class="form-control mb-3  StripeElement StripeElement--empty" value="<?php echo $row['BookingNumber'];?> "readonly="true" >
       <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name" required>
       <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name" required>
       <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address" required>
       <input type="text" name="rpmonth" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php echo $row['tpa'];?>" readonly="true" >
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>


      <button>Submit Payment</button>

      </div>
      <?php }?>

    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>
</html>