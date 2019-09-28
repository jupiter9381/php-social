<?php



require_once('init.php');


$stripe = array(
  "secret_key"      => SECRET_KEY,
  "publishable_key" => PUBLISHABLE_KEY
);


\Stripe\Stripe::setApiKey($stripe['secret_key']);



?>