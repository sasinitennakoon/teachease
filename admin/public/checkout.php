<?php

require_once '../vendor/autoload.php'; // Adjust the path based on your project structure
require_once '../secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);

// Replace with your product ID
$productId = 'prod_PSjchcVgqGl8kt';
$YOUR_DOMAIN = 'http://localhost:80//Group_Project/Admin/public';
try {
  $price = \Stripe\Price::create([
    'product' => $productId,
    'unit_amount' => 100000, // Replace with your desired amount
    'currency' => 'lkr',
]);
$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $price,
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

    // Access the created Price ID
    // $priceId = $price->id;

    // echo 'Price ID: ' . $priceId;
    header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Handle API errors
    echo 'Error: ' . $e->getMessage();
}
