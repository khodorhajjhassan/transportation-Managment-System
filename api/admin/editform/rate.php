<?php 
   require_once('../../../config.php');


   try {

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rate=$_POST['rate'];

  $sql='Update rate set rate=? Where rate_id=1';
  $stmt=mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,'i',$rate);
  if (mysqli_stmt_execute($stmt)) {
    $host = $_SERVER['HTTP_HOST'];
    echo "Rate Changed Successully";
    
     
  } else {
    echo "('Error: " . mysqli_stmt_error($stmt) . "')";
  }
  mysqli_close($conn);
}
   }
   catch (Exception $e) {
    // Handle the exception here
    echo 'An error occurred: ' . $e->getMessage();
  }
?>