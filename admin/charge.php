<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('YOUR_SECRET_KEY');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token  = $_POST['stripeToken'];
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $amount = $_POST['amount'];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source'  => $token
    ]);

    $charge = \Stripe\Charge::create([
        'customer' => $customer->id,
        'amount'   => $amount * 100,
        'currency' => 'usd'
    ]);

    echo '<h1>Payment successful!</h1>';
}
?>
