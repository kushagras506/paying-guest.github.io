<?php
//get data from form  
//$name = $_POST['name'];
$email= $_POST['email'];
$first_name= $_POST['first_name'];
$MobileNumber= $_POST['MobileNumber'];
$message= $_POST['message'];
$BookingNumber= $_POST['BookingNumber'];
$BookingDate = $_POST['BookingDate'];
$CheckinDate= $_POST['CheckinDate'];
$Status= $_POST['Status'];
$CheckoutDate= $_POST['CheckoutDate'];
$Remark= $_POST['Remark'];
$RemDate= $_POST['RemDate'];
$norooms= $_POST['norooms'];
$RPmonth= $_POST['RPmonth'];
$Payment= $_POST['Payment'];
$gst= $_POST['gst'];
$st= $_POST['st'];
$tpa= $_POST['tpa'];


$PaymentDate= $_POST['PaymentDate'];
$to_email = $email;
$subject = "$first_name ji Your Payment Successfully Recived";
$body = "Dear $first_name ji

Your payment transaction id is ($message) and your Booking id is ($BookingNumber)  \r\n 
booked on $BookingDate   From $CheckinDate  to $CheckoutDate   \r\n 
Your Status $Status by our side.         \r\n         
The Paying Guest Accommodation you booked has $norooms rooms and its Rent Per Month is ($RPmonth).  \r\n 
Your Payment is ($Payment) on $PaymentDate.  \r\n 

---------------------------------------------------------------
              Rent Per Month is:   $RPmonth       
---------------------------------------------------------------              
                              GST 18%:     $gst       
---------------------------------------------------------------
                   Service Tax 5%:     $st  
--------------------------------------------------------------- 
Total Amount Paid by you:   $tpa       
---------------------------------------------------------------


You can download invoice from user panel

";

$headers = "From: Paying Guest Accommodation" . "\r\n" 
;
if($email!=NULL){
    mail($to_email,$subject,$body,$headers);

        $mail = '<div class="alert alert-success">Application Successfully Submitted</div>';
    } else {
        $mail = '<div class="alert alert-danger">There is an Error</div>';
    }

//redirect
header("Location:transaction-report.php");
