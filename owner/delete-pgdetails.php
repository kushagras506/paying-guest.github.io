<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$did=$_GET['deleteid'];
$query=mysqli_query($con, "DELETE FROM tblpg WHERE Id='$did'");
if ($query){
    header("location:manage-pgdetails.php?deleted");
}else{
    header("location:manage-pgdetails.php?deleted");
}
?>