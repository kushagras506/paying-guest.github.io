<?php require('config.php');?>
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasuid']==0)) {
  header('location:logout.php');
  } else{
   
  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Paying Guest Accomodation System|| PG Response</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">=
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <style>
   .container{
    padding: 0.5%;
   } 
</style>
</head>

<body>

	<!-- Start Header Area -->
<?php include_once('includes/header.php');?>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex text-center align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<p class="text-white link-nav"><a href="index.php">Home </a>
						<span class="lnr lnr-arrow-right"></span> <a href="user-profile.php">
							Response of PG Owner</a></p>
					<h1 class="text-white">
						My Bookings
					</h1>

				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<p style="text-align: center;color: red;font-size: 30px"><strong>My Bookings</strong></p>
			<div class="row mt-20">
				
 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>


				<div class="col-lg-12">
					<form class="row contact_form" action="" method="post" id="">
						<div class="col-md-12">

						<?php			
$id=$_SESSION['pgasuid'];
$ret=mysqli_query($con,"select tblbookpg.Id as bookid,tblbookpg.BookingNumber,tblbookpg.BookingDate,tblbookpg.CheckinDate,tblbookpg.Status,tblpg.PGTitle,tblpg.RPmonth,tblpg.gst,tblpg.st,tblpg.tpa,customers.id from tblbookpg left join tblpg on tblpg.id=tblbookpg.Pgid left join customers on customers.bookid=tblbookpg.BookingNumber where Userid='$id'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
	?>									

						<div class="col-lg-12 col-md-9 blog_details"> 
						<table border="1" class="table table-bordered mg-b-0">
	<tr>
<th>Booking Id</th>
<td><?php echo $row['BookingNumber'];?></td>
<th>PG Name</th>
<td><?php echo $row['PGTitle'];?></td>
</tr>
<tr>
<th>Booking Date</th>
<td><?php echo $row['BookingDate'];?></td>
<th>Check-in Date</th>
<td><?php echo $row['CheckinDate'];?></td>
</tr>
<tr>
<th>Status</th>

<td><?php if($row['Status']=="")
{
echo "Not Confiremed Yet";
} else {
echo $row['Status'];
}?></td>

<td colspan="2" align="center"><?php if($row['id']){
	?>

Payment is done, Now you can download Invoice

	<?php
}else{

?>

Payment is not done Please done your payment

<?php


}
	?>
	</td>




</tr>

<tr align="right">

<th colspan="3">Rent Per Month</th>

<td colspan="3" align="center"><?php echo $row['RPmonth'];?></td>
					
	</tr>

<tr align="right">
	<th colspan="3">GST 18%</th>

<td colspan="3"  align="center"><?php echo $row['gst'];
?></td>

</tr>
<tr align="right">
	<th colspan="3">Service Tax 5%</th>

<td colspan="3" align="center"><?php echo $row['st'];?></td>

</tr>
<tr align="right">
	<th colspan="3">Total Payable Amount</th>

<td colspan="3" align="center"><?php echo $row['tpa'];?></td>

</tr>





<tr  align="right">
<?php 
                        if($row['Status']=="Confirmed") {?>
<th colspan="4">
	<div class="row">
		<div class="col-md-3">
	<a class="btn btn-success" href="booking-details.php?bkid=<?php echo $row['bookid'];?>"> View </a>
		</div>

		<div class="col-md-3">
<?php if($row['id']){
	?>


	<?php
}else{

?>

<a class="btn btn-info ms-2" href="checkoutForm.php?bkid=<?php echo $row['bookid'];?>?bNum=<?php echo $row['BookingNumber'];?>"> pay </a>

<?php


}
	?>
		</div>
		<div class="col-md-3">
		<?php 
                        if($row['id']) {?>
	<a href="pdf_gen.php?bkid=<?php echo $row['bookid'];?>" name="btn_pdf" class="btn btn-info"> Download </a>
	<?php } ?>
		</div>
	</div>
	
</th>
<?php } ?>
</tr>
<?php 
$cnt=$cnt+1;
}

?>


</table>





						
							
						</div>
						
						
					</form>
				</div>
			</div>
		</div>
		
	</section>
	<!-- End contact-page Area -->

	<!-- start footer Area -->
	<?php include_once('includes/footer.php');?>
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/ion.rangeSlider.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
 
<script type="text/javascript">
  function pay(amount) {
    var handler = StripeCheckout.configure({
      key: 'pk_test_51KNurpGxuoJeJkrLIMIw61uzkbajM3XQxeJzO0iTCjhfSjni8eYMenZVGe0n06AiULALe26NkzvqBh79OdPOhsW800ujnvTSxI', // your publisher key id
      locale: 'auto',
      token: function (token) {
        // You can access the token ID with `token.id`.
        // Get the token ID to your server-side code for use.
        console.log('Token Created!!');
        console.log(token)
        $('#token_response').html(JSON.stringify(token));
 
        $.ajax({
          url:"payment.php",
          method: 'post',
          data: { tokenId: token.id, amount: amount },
          dataType: "json",
          success: function( response ) {
            console.log(response.data);
            $('#token_response').append( '<br />' + JSON.stringify(response.data));
          }
        })
      }
    });
    handler.open({
      name: 'Demo Site',
      description: '2 widgets',
      amount: amount * 100
    });
  }
</script>
</body>

</html>
<?php } ?>