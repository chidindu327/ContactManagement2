<?php

function fetchdata($query)
{
    //include db connection
    include "dp.php";
    // Execute query
    $result = $conn->query($query);

    // Initialize array for storing results
    $resultArray = [];

    if ($result && $result->num_rows > 0) {
        // Fetch all rows and store them in the array
        while ($row = $result->fetch_assoc()) {
            $resultArray[] = $row;
        }
    }
    // Close the connection
    $conn->close();

    return $resultArray;
}
function fetch($query)
{
    //include db connection
    include "dp.php";
    // Execute query
    $result = $conn->query($query);

    // Initialize array for storing results
    $resultArray = [];
    $row = $result->fetch_assoc();
    $resultArray[]= $row;
    // Close the connection

    return $resultArray;
}


// Function to execute an INSERT query
function execute($query) {
    //include db connection
    include "dp.php";

    // Execute the insert query
    if ($conn->query($query) === TRUE) {
        // Success message or return true
        return "Record inserted successfully";
    } else {
        // Error message or return false
        return "Error: " . $conn->error;
}
}
