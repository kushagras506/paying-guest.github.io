<?php 
require('stripe-php-master/init.php');

$publisihableKey='pk_test_51KNurpGxuoJeJkrLIMIw61uzkbajM3XQxeJzO0iTCjhfSjni8eYMenZVGe0n06AiULALe26NkzvqBh79OdPOhsW800ujnvTSxI';

$scretKey='sk_test_51KNurpGxuoJeJkrLEMhyKb5vGvPuxAOa7t7y8u5r400irjxzUnX3gxatcWXx4YGkM4LIErxmDLxIk1DJOFIONERX00cQPK2xtu';

\Stripe\Stripe::setApiKey($scretKey)
?>