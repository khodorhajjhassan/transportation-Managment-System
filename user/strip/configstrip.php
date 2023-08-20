<?php 
 
// Product Details 
// Minimum amount is $0.50 US 
$itemName = "Demo Product"; 
$itemPrice = 25;  
$currency = "USD";  
 
/* Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
define('STRIPE_API_KEY', 'sk_test_51NME2wBC4rKOPGa91ACVTyNL5WGvPxLDNGVCZDcvKExoxBkmIgqIuErDe5brqVjOsnE2tXZ1kgjbI3Nokc9iDAZh00TPxhn16I'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51NME2wBC4rKOPGa9VCeuiyDmgVZyJJmiaIIbUjnQ7gWDolvwWNlJXFaiQR07FKcdldGbbLGMA9CafzLyQKkxdk7V00Ow40ZIfp'); 
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', 'root');  
define('DB_NAME', 'skyline'); 
 
?>