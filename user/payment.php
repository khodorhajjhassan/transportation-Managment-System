
<?php 
require_once 'strip/configstrip.php'; 
$key = "pk_test_51NME2wBC4rKOPGa9VCeuiyDmgVZyJJmiaIIbUjnQ7gWDolvwWNlJXFaiQR07FKcdldGbbLGMA9CafzLyQKkxdk7V00Ow40ZIfp";
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $tripid=$_GET['t'];
    $userid=$_GET['u'];
    $paymentprice=$_GET['p'];
    $currency = (substr($paymentprice, 0, 1) === '$') ? 'USD' : 'LBP';
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body style="background-color: var(--backColor) !important;">
<div id="loadingCircle" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<div class="container mb-5">
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Charge <?php /*echo '$'.$paymentprice;*/ ?> with SkyLine</h3>
        </div>
        <div class="card-body">
            <!-- Product Info -->
            <p class="small"><b>Trip ID:</b> <?php echo $tripid; ?></p>
            <p class="small"><b>Price:</b> <?php echo (substr($paymentprice, 0, 1) === '$') ? $paymentprice.' '.'USD' : $paymentprice.' '.'LBP'; ?></p>

        
            <!-- Display status message -->
            <div id="paymentResponse" class="alert alert-success d-none"></div>
        
            <!-- Display a payment form -->
            <form id="paymentFrm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>
                
                <div id="paymentElement">
                    <!-- Stripe.js injects the Payment Element -->
                </div>
                
                <!-- Form submit button -->
                <!-- Form submit button -->
<div class="d-flex justify-content-center m-3">
    <button id="submitBtn" class="btn btn-success">
        <div class="spinner-border spinner-border-sm d-none" id="spinner" role="status"></div>
        <input type="hidden" id="tripid" name="tripid" value="<?php echo isset($_GET['t'])?$_GET['t']:''; ?>">
        <input type="hidden" id="userid" name="userid" value="<?php echo isset($_GET['u'])?$_GET['u']:''; ?>">
        <input type="hidden" id="paymentprice" name="paymentprice" value="<?php echo isset($_GET['p'])?$_GET['p']:''; ?>">
        <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>">
        <span id="buttonText">Pay Now</span>
    </button>
</div>

            </form>
        
            <!-- Display processing notification -->
            <div id="frmProcess" class="alert alert-info d-none">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...
            </div>
        
            <!-- Display re-initiate button -->
            <div id="payReinit" class="alert alert-primary d-none">
            <button class="btn btn-primary" onClick="window.location.href = window.location.href.split('&customer_id=')[0]">
                    <i class="fas fa-redo-alt"></i> Re-initiate Payment
                </button>
            </div>
        </div>
    </div>
</div>
<?php include('../include/footer.html')   ?>
<!-- Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>
<script src="js/checkout.js" STRIPE_PUBLISHABLE_KEY="<?php echo $key; ?>" defer></script>
<script>
window.addEventListener('load', function() {
    var loadingCircle = document.getElementById('loadingCircle');
    var container = document.querySelector('.container');
    
    container.classList.remove('d-none'); 
    loadingCircle.style.display = 'none'; 
});
</script>
</body>
</html>
