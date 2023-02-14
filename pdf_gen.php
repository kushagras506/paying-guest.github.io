<?php
include('includes/dbconnection.php');

session_start();
error_reporting(0);
require('fpdf.php');

$id=$_SESSION['pgasuid'];
$bookid=intval($_GET['bkid']);
$ret=mysqli_query($con,"select tblbookpg.BookingNumber,date(tblbookpg.BookingDate),tblbookpg.CheckinDate,tblbookpg.Status,tblbookpg.RemDate,tblbookpg.Remark,tblbookpg.UserMsg,customers.id,customers.first_name,customers.last_name,customers.email,tblbookpg.Userid,tblbookpg.CheckoutDate,tblpg.PGTitle,tblpg.norooms,tblpg.Email,tblpg.MobileNumber,tblpg.Address,tblpg.RPmonth,tblpg.gst,tblpg.st,tblpg.tpa,date(customers.created_at) from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid left join customers on customers.bookid=tblbookpg.BookingNumber where tblbookpg.ID='$bookid'");
$cnt=1;

while ($row=mysqli_fetch_array($ret)) {

    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(130,5,'Paying Guest Accommodation',0,0);
    $pdf->Cell(59,5,'Invoice',0,1);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,5,'',0,1);
    $pdf->Cell(100,5,'Bill From:-',0,1);
   
    $pdf->Cell(10,5,'',0,0);
    $pdf->Cell(120,5,$row['PGTitle'],0,0);
    $pdf->Cell(28,5,'Date',0,0);
    $pdf->Cell(34,5,$row['date(tblbookpg.BookingDate)'],0,1);

    $pdf->Cell(10,5,'',0,0);
    $pdf->Cell(120,5,$row['Address'],0,0);
    $pdf->Cell(28,5,'Booking ID #',0,0);
    $pdf->Cell(34,5,$row['BookingNumber'],0,1);

    $pdf->Cell(10,5,'',0,0);
    $pdf->Cell(120,5,$row['Email'],0,0);
    $pdf->Cell(28,5,'Customer ID: ',0,0);
    $pdf->Cell(34,5,$row['Userid'],0,1);

    $pdf->Cell(10,5,'',0,0);
    $pdf->Cell(120,5,$row['MobileNumber'],0,0);
    $pdf->Cell(28,5,'',0,0);
   


$pdf->Cell(189,10,'',0,1);

if($row['date(customers.created_at)']){
$pdf->Cell(100,5,'Bill to',0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(18,5,$row['first_name'],0,0);
$pdf->Cell(90,5,$row['last_name'],0,1);


$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,$row['email'],0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,'',0,1);

}


$pdf->Cell(189,10,'',0,1);


if($row['date(customers.created_at)']){
    $pdf->Cell(90,8,'Transaction ID:-',1,0);
    $pdf->Cell(90,8,$row['id'],1,1);
}





$pdf->Cell(45,8,'Booking ID',1,0);
$pdf->Cell(45,8,$row['BookingNumber'],1,0);
$pdf->Cell(45,8,'Booking Date',1,0);
$pdf->Cell(45,8,$row['date(tblbookpg.BookingDate)'],1,1);



$pdf->Cell(45,8,'Check-in Date',1,0);
$pdf->Cell(45,8,$row['CheckinDate'],1,0);
$pdf->Cell(45,8,'Status',1,0);
$pdf->Cell(45,8,$row['Status'],1,1);

$pdf->Cell(45,8,'Your Remark',1,0);
$pdf->Cell(45,8,$row['UserMsg'],1,0);
$pdf->Cell(45,8,'Check-out Date',1,0);
$pdf->Cell(45,8,$row['CheckoutDate'],1,1);


$pdf->Cell(45,8,'Owner Remark',1,0);
$pdf->Cell(135,8,$row['Remark'],1,1);

$pdf->Cell(45,8,'Owner Remark Date',1,0);
$pdf->Cell(135,8,$row['RemDate'],1,1);

$pdf->SetFont('Arial','B',12);
if($row['date(customers.created_at)']){
    $pdf->Cell(45,8,'Status',1,'0','C');
    $pdf->Cell(45,8,'Paid',1,'0','C');
}


if($row['date(customers.created_at)']){
    $pdf->Cell(45,8,'Payment Date',1,'0','C');
    $pdf->Cell(45,8,$row['date(customers.created_at)'],1,'1','C');
}
$pdf->SetFont('Arial','',12);

$pdf->Cell(45,8,'No Of Rooms',1,'0','C');
$pdf->Cell(45,8,$row['norooms'],1,'0','C');
$pdf->Cell(45,8,'Rent Per Month',1,'0','C');
$pdf->Cell(45,8,$row['RPmonth'],1,'1','C');



$pdf->Cell(135,8,'GST 18%',1,'0','R');
$pdf->Cell(45,8,$row['gst'],1,'1','C');


$pdf->Cell(135,8,'Service Tax 5%',1,'0','R');
$pdf->Cell(45,8,$row['st'],1,'1','C');

$pdf->Cell(135,8,'Total Paid Amount',1,'0','R');
$pdf->Cell(45,8,$row['tpa'],1,'1','C');

$pdf->Output();
                
}
echo $id;
$pdf = new FPDF();
$pdf->AddPage();

?>


















