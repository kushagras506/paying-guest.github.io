<?php
  require_once('vendor/autoload.php');
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');

  \Stripe\Stripe::setApiKey('sk_test_51KNtyEJZD4wGaK5uYE1kvqouxLpc1OnMExvFjehKS7jQ8kUSVsfj7rVQ57Oyo0id9bOZDW2rwKAlC6KdfZ7pMf2a00N4TMAZfV');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $first_name = $POST['first_name'];
 $last_name = $POST['last_name'];
 $email = $POST['email'];
 $bookid = $POST['bookid'];
 $amount = $POST['rpmonth'];
 $token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token,
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $amount,
  "currency" => "INR",
  "description" => "Hey thank you for your payment",
  "customer" => $customer->id,
));

// Customer Data
$customerData = [
  'id' => $charge->customer,
  'bookid'=>$bookid,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email,
];

// Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);


// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'description' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&description='.$charge->description);