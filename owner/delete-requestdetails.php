<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$did=$_GET['deleteid'];
$query=mysqli_query($con, "DELETE FROM `tblbookpg` WHERE `tblbookpg`.`ID` = $did");
if ($query){
    header("location:confirmed-pgbooking.php?deleted");
}else{
    header("location:confirmed-pgbooking.php?deleted");
}
?>