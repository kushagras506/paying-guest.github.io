<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
<title>Paying Guest Accomodation System|| Booking Requests</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>

<body>
<section id="container">
    <!-- Start Header Area -->
    <?php include_once('includes/header.php');?>
    <!-- End Header Area -->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
    <!-- start banner Area -->
    <section id="main-content">
      
	<section class="wrapper">
 
		<div class="table-agile-info">
 <div class="panel panel-default">
 <form action="email-script.php" method="post">
    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <div class="panel-heading">
     Paying Guest Details
    </div>
    <div>
            
                 <?php
 $bookid=intval($_GET['bkid']);
 $oid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select tblbookpg.BookingNumber,date(tblbookpg.BookingDate),tblbookpg.CheckinDate,tblbookpg.Status,tblbookpg.RemDate,tblbookpg.Remark,tblbookpg.UserMsg,customers.id,customers.first_name,customers.last_name,customers.email,tblbookpg.Userid,tblbookpg.CheckoutDate,tblpg.PGTitle,tblpg.norooms,tblpg.Email,tblpg.MobileNumber,tblpg.Address,tblpg.gst,tblpg.st,tblpg.tpa,tblpg.RPmonth,date(customers.created_at) from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid left join customers on customers.bookid=tblbookpg.BookingNumber where tblbookpg.ID='$bookid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <table border="0" class="table table-bordered mg-b-0">
                <tr>
                <th>Name</th>
    <td><input type="first_name"  name="first_name" value="<?php  echo $row['first_name'];?>" style="width: 100%;height: 50px;" readonly="true"></td>
    <th>Email</th>
    <td colspan="2">
    <input type="email"  name="email" value="<?php  echo $row['email'];?>" style="width: 100%;height: 50px;" readonly="true"></td>


 
    </tr>   
                <tr>
                <th>MobileNumber</th>
    <td>
    <input type="MobileNumber"  name="MobileNumber" value="<?php  echo $row['MobileNumber'];?>" style="width: 100%;height: 50px;" readonly="true"></td>
    <th>transaction Id</th>
    <th ><input type="message" name="message" value="<?php  echo $row['id'];?>" style="width: 100%;height: 50px;" readonly="true"></th>
    
  </tr>             
  <tr>
    <th>Booking Id</th>
    <td>
    <input type="BookingNumber"  name="BookingNumber" value="<?php  echo $row['BookingNumber'];?>" style="width: 100%;height: 50px;" readonly="true"></td>
     <th>Booking Date</th>
    <td>
    <input type="BookingDate"  name="BookingDate" value="<?php  echo $row['date(tblbookpg.BookingDate)'];?>" style="width: 100%;height: 50px;" readonly="true"></td>  
  </tr>   
   <tr>
    <th>Check-in Date</th>
    <td>
    <input type="CheckinDate"  name="CheckinDate" value="<?php  echo $row['CheckinDate'];?>" style="width: 100%;height: 50px;" readonly="true"></td>    
 
    <th>Status</th>
    <td>
    <input type="Status"  name="Status" value=" <?php if($row['Status']=="")
{
echo "Not Confiremed Yet";
} else {
echo $row['Status'];
}?>" style="width: 100%;height: 50px;" readonly="true"></td>    
    
  </tr>
  <tr>
    <th>User Remark</th>
    <td>
    <input type="UserMsg"  name="UserMsg" value="<?php  echo $row['UserMsg'];?>" style="width: 100%;height: 50px;" readonly="true"></td>      
   
    <th>Check-out Date</th>
    <td>
    <input type="CheckoutDate"  name="CheckoutDate" value="<?php  echo $row['CheckoutDate'];?>" style="width: 100%;height: 50px;" readonly="true"></td>      
    
  </tr>  
   <tr>
       <th>Owner Remark</th>
    <td colspan="3">
    <input type="Remark"  name="Remark" value="<?php  echo $row['Remark'];?>" style="width: 100%;height: 50px;" readonly="true"></td>      

  </tr>                 
<tr>
    <th>Owner Remark Date</th>
    <td colspan="3">
    <input type="RemDate"  name="RemDate" value="<?php  echo $row['RemDate'];?>" style="width: 100%;height: 50px;" readonly="true"></td>    
   
  </tr>

               
   <tr>
  <th>Payment</th>
    <td>
    <input type="Payment"  name="Payment" value=" <?php if($row['date(customers.created_at)']=="")
{
echo "Unpaid";
} else {
echo "paid";
}?>" style="width: 100%;height: 50px;" readonly="true"></td>    

<th>Payment Date</th>
    <td>
    <input type="PaymentDate"  name="PaymentDate" value="<?php if($row['date(customers.created_at)']=="")
{
echo "";
} else {
  echo $row['date(customers.created_at)'];
}?>" style="width: 100%;height: 50px;" readonly="true"></td> 


  </tr>

  <tr>
    <th>Number of Rooms</th>
    <td>
    <input type="norooms"  name="norooms" value="<?php  echo $row['norooms'];?>" style="width: 100%;height: 50px;" readonly="true"></td>      
  
    <th>Rent Per Month</th>
    <td>
    <input type="RPmonth"  name="RPmonth" value="<?php  echo $row['RPmonth'];?>" style="width: 100%;height: 50px;" readonly="true"></td>      
  </tr> 



  <tr>
    <th></th>
    <td>
   </td>      
  
    <th>GST 18%</th>
    <td>
    <input type="gst"  name="gst" value="<?php  echo $row['gst'];?>" style="width: 100%;height: 50px;" readonly="true"></td>      
  </tr> 

  <tr>
    <th></th>
    <td>
   </td>      
  
    <th>Service Tax 5%</th>
    <td>
    <input type="st"  name="st" value="<?php  echo $row['st'];?>" style="width: 100%;height: 50px;" readonly="true"></td>      
  </tr> 



  <tr>
    <th></th>
    <td>
   </td>      
  
    <th>Total Paid By User</th>
    <td>
    <input type="tpa"  name="tpa" value="<?php  echo $row['tpa'];?>" style="width: 100%;height: 50px;" readonly="true"></td>      
  </tr> 






  
  <?php } ?>
</table>
<center>
<input class="btn btn-info ms-2" type="submit" value="Email Send">
<center>
    </div>
  </div>
</div>

</form>

</section>

 <!-- footer -->
		 <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php }  ?>