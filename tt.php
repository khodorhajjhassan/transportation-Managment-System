<?php

require 'config.php';
$id=16228296;
$tripid=5121239;

$query = "SELECT * FROM transactions WHERE userid = ? AND tripid = ?";
$transcationstmt = $conn->prepare($query);

// Bind the values to the placeholders
$transcationstmt->bind_param("ii", $id, $tripid);

// Execute the query
$transcationstmt->execute();

// Get the result
$result = $transcationstmt->get_result();

while ($row = $result->fetch_assoc()) {
    // Access the columns by their names
    echo "Transaction ID: " . $row['txn_id'] . "<br>";
    echo "Amount: " . $row['item_price'] . "<br>";
    // ...
}

?>