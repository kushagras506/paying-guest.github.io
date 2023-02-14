
<header class="default-header">
       
<div class="menutop-wrap">
            
        </div>

        <div class="main-menu">
            <div class="container">
                <div class="row d-flex">
                    <div class="logo col-md-5">
                    <img style="width:100px" src="./img/logo6.png" alt="">
                    </div>
                    <nav id="nav-menu-container col-md-7">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="index.php">home</a></li>
                            <li><a href="pg.php">PG</a></li>
                            <li><a href="about-us.php">about</a></li>
                           
                            
                            
                             <?php 
                        if(strlen($_SESSION['pgasuid']==0)) {?> 
                        <li><a href="owner/login-user.php">Owner</a></li>
                        <li><a href="signup-user.php">login / register</a></li>
                        <li><a href="admin/login.php">Admin</a></li>
                                                <?php } ?>

                            <li><a href="contact.php">Contact</a></li>
                             <?php if (strlen($_SESSION['pgasuid']>0)) {?>
                            <li><a href="apply-forpg.php">Book Your PG</a></li>
                            <li class="menu-has-children"><a href="">My Account</a>
                                <ul>
                                    <li><a href="user-profile.php">My Profile</a></li>
                                    <li><a href="my-bookings.php">My Bookings</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <!-- //notification start -->
                            <?php    
                             if (strlen($_SESSION['pgasuid']>0)) {
                             $oid=$_SESSION['pgasuid']; 
$ret1=mysqli_query($con,"select tblbookpg.ID,tblbookpg.Status,tbluser.FullName from tblbookpg join tbluser on tbluser.ID=tblbookpg.Userid join tblpg on tblpg.ID=tblbookpg.Pgid where tblbookpg.Status is not null and tbluser.ID='$oid' ");
$num=mysqli_num_rows($ret1);}
?>  
                             <li id="header_inbox_bar" class="dropdown"><a data-toggle="dropdown"  href="#" href="">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-important"><?php echo $num;?></span>
                            </a>
                            <ul>
                <li>
                             </li>
                             <li>
                             </li>
<?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
?>
<span class="subject">
<span class="from"><a class="dropdown-item" href="my-bookings.php"><?php echo $result['FullName'];?> Your booking Booking <?php echo $result['Status'];?></a></span>
</span>
                </li>
                <?php } }  else {?>
  <li>  No New Booking Received</li>
        <?php } ?>
        <li>
                    <a href="my-bookings.php">See all messages</a>
                </li>
                             </ul>
                </li>
                        
                        
                        </li>
                           
                            <?php } ?>
                        </ul>
                        </li>
                        <!-- notification end / -->
                        </ul>
                    </nav>
         
                   
                    <!--######## #nav-menu-container -->
                </div>
            </div>
        </div>
    </header>