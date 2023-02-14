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
    
    <!-- Site Title -->
    <title>PG Accomodation details Details</title>

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
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="particularpg-details.php">
                            My Booking
                        </a>
                        
                        </p>
                    <h1 class="text-white">
                       Booking Details
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!--  Blog Area -->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row mt-80">
                 <?php
 $bookid=intval($_GET['bkid']);
$ret=mysqli_query($con,"select * from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where tblbookpg.ID='$bookid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-lg-12 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img" align="center">
                              <h1 id="payBill"></h1>
<img src="owner/roomimages/<?php echo $row['Image'];?>" alt="" height='350' width="1000" style="border:#000 solid 2px;" ></div>
 <h2 align="center" style="padding-top:2%"><?php echo $row['PGTitle'];?>'s PG Booking Details</h2>
 </div>
  <div class="col-lg-12 col-md-9 blog_details"> 
<table border="1" class="table table-bordered mg-b-0">
                    
Full texts
ID	
Userid	
Pgid	
BookingNumber	
CheckinDate	
UserMsg	
BookingDate	
Remark	
Status	
RemDate
  <tr>
    <th>Booking Id</th>
    <td><?php  echo $row['BookingNumber'];?></td>
  </tr>   

  <tr>
    <th>User Remark</th>
    <td colspan="3"><?php  echo $row['UserMsg'];?></td>

  </tr>  
   <tr>
       <th>Owner Remark</th>
    <td colspan="3"><?php  echo $row['Remark'];?></td>
  </tr>                 
<tr>
    <th>Booking Date</th>
    <td colspan="3"><?php  echo $row['BookingDate'];?></td>
  </tr>
<tr>
<tr>
    <th>Checking Date</th>
    <td colspan="3"><?php  echo $row['CheckinDate'];?></td>
  </tr>
<tr>
    <th>Price</th>
    <td colspan="3"><?php  echo $row['RPmonth'];?>tk</td>
  </tr>
 </table>
  </div>                     
  <div class="container">
  <div class="row p-5">
      <div class="col-md-4"></div>
    <div class="col-md-4">
      <button class="btn btn-primary btn-block" onclick="pay(<?php echo $row['RPmonth']*100;?>)">Checkout</button>
    </div>
    <div class="col-md-4"></div>

  </div>
</div>

                  

      <?php } ?>  
 

                        </div>
                     
                    </div>
                
            
        </div>
    </section>
    <!--  Blog Area -->

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
        // console.log(token)
        $('#token_response').html(JSON.stringify(token));
        $.ajax({
          url:"payment.php",
          method: 'post',
          data: { tokenId: token.id, amount: amount },
          dataType: "json",
          success: function( response ) {
            console.log(response.data);
            $amount=response.data.amount;
            $status=response.data.status;
            $('#token_response').append( '<br />' + console.log(JSON.stringify(response.data)));
          }
         
        })

      }
    });
        
    handler.open({
        <?php
 $bookid=intval($_GET['bkid']);
$ret=mysqli_query($con,"select * from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where tblbookpg.ID='$bookid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
      name: 'Pay For <?php echo $row['PGTitle'];?>',
      email:'hello@gmail.com',
      description: "Please put your accout detail's carefully",
      amount: amount,
  
    });
    
    <?php }  ?>  
  }
</script>
</body>

</html>
<?php } ?>