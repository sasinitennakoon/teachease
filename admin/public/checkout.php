<?php

require_once '../vendor/autoload.php'; // Adjust the path based on your project structure
require_once '../secrets.php';
require_once '../../database/db_con.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);

// Replace with your product ID
$productId = 'prod_PSjchcVgqGl8kt';
$YOUR_DOMAIN = 'http://localhost:80//Group_Project/Admin/public';

try {
  $product = \Stripe\Product::retrieve($productId);///Modified

  $price = \Stripe\Price::create([
    'product' => $productId,
    'unit_amount' => 100000, // Replace with your desired amount
    'currency' => 'lkr',
]);

$productId = $productId; // Replace with your actual product ID
$productName = $product->name;
$unit = $price->unit_amount/ 100;
$priceId = $price->id;
$quantity = 1;

mysqli_query($link,"insert into products(product_id,price_id,product_name,quantity,price) values('$productId','$priceId','$productName','$quantity','$unit')") or die(mysqli_error($link));

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
