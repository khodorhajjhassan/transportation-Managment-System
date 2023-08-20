
<?php

require('../config.php');
// Query for monthly user counts
$queryUsers = "SELECT MONTH(createAt) AS month, COUNT(userid) AS count
 FROM users
 WHERE YEAR(createAt) = YEAR(CURRENT_DATE())
 GROUP BY MONTH(createAt)
 ORDER BY MONTH(createAt)";

$resultUsers = $conn->query($queryUsers);

$userCounts = [];
if ($resultUsers->num_rows > 0) {
while ($row = $resultUsers->fetch_assoc()) {
$userCounts[$row['month']] = $row['count'];
}
}

// Query for monthly profit amounts
$queryProfit = "SELECT MONTH(trips.createdAt) AS month, SUM(payments.amountpaid) AS amount
  FROM trips
  INNER JOIN payments ON trips.tripid = payments.tripid
  WHERE YEAR(trips.createdAt) = YEAR(CURRENT_DATE())
  GROUP BY MONTH(trips.createdAt)
  ORDER BY MONTH(trips.createdAt)";

$resultProfit = $conn->query($queryProfit);

$profitAmounts = [];
if ($resultProfit->num_rows > 0) {
while ($row = $resultProfit->fetch_assoc()) {
$profitAmounts[$row['month']] = $row['amount'];
}
}

// Query for monthly trip counts
$queryTrips = "SELECT MONTH(createdAt) AS month, COUNT(tripid) AS count
 FROM trips
 WHERE YEAR(createdAt) = YEAR(CURRENT_DATE())
 GROUP BY MONTH(createdAt)
 ORDER BY MONTH(createdAt)";

$resultTrips = $conn->query($queryTrips);

$tripCounts = [];
if ($resultTrips->num_rows > 0) {
while ($row = $resultTrips->fetch_assoc()) {
$tripCounts[$row['month']] = $row['count'];
}
}

$conn->close();

$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$nboftripsMonthData = array_fill_keys($months, 0);
$totalamountMonthData = array_fill_keys($months, 0);
$nbofusersMonthData = array_fill_keys($months, 0);

// Update the values based on the retrieved data
foreach ($tripCounts as $month => $count) {
$nboftripsMonthData[$months[$month - 1]] = (int)$count;
}

foreach ($profitAmounts as $month => $amount) {
$totalamountMonthData[$months[$month - 1]] = (int)$amount;
}

foreach ($userCounts as $month => $count) {
$nbofusersMonthData[$months[$month - 1]] = (int)$count;
}

$response = [
'months' => array_values($months),
'nboftripsMonth' => array_values($nboftripsMonthData),
'totalamountMonth' => array_values($totalamountMonthData),
'nbofusersMonth' => array_values($nbofusersMonthData)
];



echo json_encode($response);

?>
