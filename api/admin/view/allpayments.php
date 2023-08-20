<?php
require('../../../config.php')
?>
<?php 
$query="SELECT t.*,
f.rating,
f.comments
FROM transactionsview t
LEFT JOIN feedback f ON t.tripid = f.tripid
              AND t.userid = f.userid";
$result=mysqli_query($conn,$query);
$payments=array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $payments[] = $row;
    }
}
$conn->close();
header('Content-Type: application/json');
echo json_encode($payments);
?>