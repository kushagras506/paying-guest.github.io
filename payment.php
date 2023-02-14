<?php
    session_start();
    error_reporting(0);
    require_once('vendor/autoload.php');
 
    if($_POST['tokenId']) {
     
      //stripe secret key or revoke key
      $stripeSecret = 'sk_test_51KNurpGxuoJeJkrLEMhyKb5vGvPuxAOa7t7y8u5r400irjxzUnX3gxatcWXx4YGkM4LIErxmDLxIk1DJOFIONERX00cQPK2xtu';

      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey($stripeSecret);

     // Get the payment token ID submitted by the form:
      $token = $_POST['tokenId'];
      $amount=$_POST['amount'];
      // Charge the user's card:
      $charge = \Stripe\Charge::create(array(
          ":amount" => $_POST['amount'],
          "currency" => "INR",
          "description" =>"Hey,Someone just pay",
          "source" => $token,
       ));
       id		
       $query = "
		INSERT INTO transactions 
    	(customer_name, customer_email) 
    	VALUES (:amount,'1')
		";

		$statement = $connect->prepare($query);

       // after successfull payment, you can store payment related information into your database
        $data = array('success' => true, 'data'=> $charge);

        echo json_encode($data); 

}

