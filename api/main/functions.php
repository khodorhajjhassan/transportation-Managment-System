
<?php

function getTrips($conn, $condition, $data)
{
    $query = "SELECT
        `skyline`.`trips`.`tripid` AS `tripid`,
        `skyline`.`trips`.`seats` AS `seats`,
        `skyline`.`station`.`provincename` AS `origin`,
        `station2`.`provincename` AS `destination`,
        `skyline`.`station`.`stationname` AS `originlocation`,
        `station2`.`stationname` AS `destinationlocation`,
        DATE_FORMAT(`skyline`.`trips`.`schedule`, '%Y-%m-%d') AS `schedule`,
        TIME_FORMAT(`skyline`.`trips`.`movetime`, '%H:%i') AS `movetime`,
        TIME_FORMAT(`skyline`.`trips`.`arrivetime`, '%H:%i') AS `arrivetime`,
        TIME_FORMAT(TIMEDIFF(`skyline`.`trips`.`arrivetime`, `skyline`.`trips`.`movetime`), '%H:%i') AS `time_difference`,
        `skyline`.`trips`.`ticketprice` AS `ticketprice`
    FROM
        `skyline`.`trips`
    JOIN `skyline`.`station` ON (`skyline`.`station`.`stationid` = `skyline`.`trips`.`tripfrom`)
    JOIN `skyline`.`station` `station2` ON (`station2`.`stationid` = `skyline`.`trips`.`tripto`)
    WHERE
        `skyline`.`station`.`provincename` = ? AND `station2`.`provincename` = ? AND seats!=0 AND
        `skyline`.`trips`.`schedule` >= CURDATE() AND
        CONCAT(`skyline`.`trips`.`schedule`, ' ', `skyline`.`trips`.`movetime`) >= NOW()";
        
    $params = array($data[0]['origin'], $data[0]['destination']);

    if ($condition == 'All') {
        $query .= " AND DATE(`skyline`.`trips`.`schedule`) = ? AND `movetime` = ?";
        $params[] = $data[0]['tripdate'];
        $params[] = $data[0]['triptime'];
    } elseif ($condition == 'triptime') {
        $query .= " AND `movetime` = ?";
        $params[] = $data[0]['triptime'];
    } elseif ($condition == 'tripdate') {
        $query .= " AND DATE(schedule) = ?";
        $params[] = $data[0]['tripdate'];
    } elseif ($condition == 'validated') {
        // Handle the 'validated' condition if needed
    }

    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die('Error preparing the statement: ' . mysqli_error($conn));
    }

    // Bind parameters to the prepared statement
    $types = str_repeat('s', count($params));
    mysqli_stmt_bind_param($stmt, $types, ...$params);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        die('Error executing the statement: ' . mysqli_stmt_error($stmt));
    }

    // Get the results
    $searchResults = array();
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = array(
            'tripid' => $row['tripid'],
            'origin' => $row['origin'],
            'destination' => $row['destination'],
            'schedule' => $row['schedule'],
            'seats' => $row['seats'],
            'movetime' => $row['movetime'],
            'arrivetime' => $row['arrivetime'],
            'ticketprice' => $row['ticketprice'],
            'time_difference' => $row['time_difference'],
            'originlocation' => $row['originlocation'],
            'destinationlocation' => $row['destinationlocation']
        );
    }

    mysqli_stmt_close($stmt);

    return $searchResults;
}





function getTripsLogged($conn, $condition, $data)
{
    $query = "SELECT
    `skyline`.`trips`.`tripid` AS `tripid`,
    `skyline`.`station`.`provincename` AS `origin`,
    `skyline`.`trips`.`seats` AS `seats`,
    `station2`.`provincename` AS `destination`,
    `skyline`.`station`.`stationname` AS `originlocation`,
    `station2`.`stationname` AS `destinationlocation`,
    DATE_FORMAT(`skyline`.`trips`.`schedule`, '%Y-%m-%d') AS `schedule`,
    TIME_FORMAT(`skyline`.`trips`.`movetime`, '%H:%i') AS `movetime`,
    TIME_FORMAT(`skyline`.`trips`.`arrivetime`, '%H:%i') AS `arrivetime`,
    TIME_FORMAT(TIMEDIFF(`skyline`.`trips`.`arrivetime`, `skyline`.`trips`.`movetime`), '%H:%i') AS `time_difference`,
    `skyline`.`trips`.`ticketprice` AS `ticketprice`
FROM
    `skyline`.`trips`
JOIN `skyline`.`station` ON (`skyline`.`station`.`stationid` = `skyline`.`trips`.`tripfrom`)
JOIN `skyline`.`station` `station2` ON (`station2`.`stationid` = `skyline`.`trips`.`tripto`)
WHERE `skyline`.`station`.`provincename` = ? AND `station2`.`provincename` = ? AND seats!=0 AND
 `skyline`.`trips`.`schedule` >= CURDATE() AND
 CONCAT(`skyline`.`trips`.`schedule`, ' ', `skyline`.`trips`.`movetime`) >= NOW() AND
   NOT EXISTS (
        SELECT *
        FROM `transactions`
        WHERE
            `transactions`.`tripid` = `skyline`.`trips`.`tripid`
            AND `transactions`.`userid` = ?
    )";
        
    $params = array($data[0]['origin'], $data[0]['destination'],$data[0]['userid']);

    if ($condition == 'All') {
        $query .= " AND DATE(`skyline`.`trips`.`schedule`) = ? AND `movetime` = ?";
        $params[] = $data[0]['tripdate'];
        $params[] = $data[0]['triptime'];
    } elseif ($condition == 'triptime') {
        $query .= " AND `movetime` = ?";
        $params[] = $data[0]['triptime'];
    } elseif ($condition == 'tripdate') {
        $query .= " AND DATE(schedule) = ?";
        $params[] = $data[0]['tripdate'];
    } elseif ($condition == 'validated') {
        // Handle the 'validated' condition if needed
    }

    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die('Error preparing the statement: ' . mysqli_error($conn));
    }

    // Bind parameters to the prepared statement
    $types = str_repeat('s', count($params));
    mysqli_stmt_bind_param($stmt, $types, ...$params);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        die('Error executing the statement: ' . mysqli_stmt_error($stmt));
    }

    // Get the results
    $searchResults = array();
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = array(
            'tripid' => $row['tripid'],
            'origin' => $row['origin'],
            'destination' => $row['destination'],
            'schedule' => $row['schedule'],
            'seats' => $row['seats'],
            'movetime' => $row['movetime'],
            'arrivetime' => $row['arrivetime'],
            'ticketprice' => $row['ticketprice'],
            'time_difference' => $row['time_difference'],
            'originlocation' => $row['originlocation'],
            'destinationlocation' => $row['destinationlocation']
        );
    }

    mysqli_stmt_close($stmt);

    return $searchResults;
}
?>