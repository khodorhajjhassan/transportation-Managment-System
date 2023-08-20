<?php 
// Include configuration file  
require_once 'config.php'; 
$key = "pk_test_51NME2wBC4rKOPGa9VCeuiyDmgVZyJJmiaIIbUjnQ7gWDolvwWNlJXFaiQR07FKcdldGbbLGMA9CafzLyQKkxdk7V00Ow40ZIfp"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Charge <?php echo '$'.$itemPrice; ?> with Stripe</h3>
        </div>
        <div class="card-body">
            <!-- Product Info -->
            <p><b>Item Name:</b> <?php echo $itemName; ?></p>
            <p><b>Price:</b> <?php echo '$'.$itemPrice.' '.$currency; ?></p>
        
            <!-- Display status message -->
            <div id="paymentResponse" class="alert alert-success d-none"></div>
        
            <!-- Display a payment form -->
            <form id="paymentFrm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Enter name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter email" required>
                </div>
                
                <div id="paymentElement">
                    <!-- Stripe.js injects the Payment Element -->
                </div>
                
                <!-- Form submit button -->
                <button id="submitBtn" class="btn btn-success">
                    <div class="spinner-border spinner-border-sm d-none" id="spinner" role="status"></div>
                    <span id="buttonText">Pay Now</span>
                </button>
            </form>
        
            <!-- Display processing notification -->
            <div id="frmProcess" class="alert alert-info d-none">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...
            </div>
        
            <!-- Display re-initiate button -->
            <div id="payReinit" class="alert alert-primary d-none">
                <button class="btn btn-primary" onClick="window.location.href=window.location.href.split('?')[0]">
                    <i class="fas fa-redo-alt"></i> Re-initiate Payment
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>
<script src="js/checkout.js" STRIPE_PUBLISHABLE_KEY="<?php echo $key; ?>" defer></script>

</body>
</html>
