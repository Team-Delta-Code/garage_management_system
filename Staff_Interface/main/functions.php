<?php

//generate 5 digit numbers for unique ids
function generateFiveDigitNumber() {
    // Generate a random number between 10000 and 99999
    $number = rand(10000, 99999);
    return $number;
}

//check item availability
function checkItemExists($connection, $itemName, $tableName, $column_name) {
    // Prepare the SQL statement
    $stmt00 = $connection->prepare("SELECT * FROM `$tableName` WHERE `$column_name` = ?");
    
    // Bind the parameter
    $stmt00->bind_param("s", $itemName);
    
    // Execute the statement
    $stmt00->execute();
    
    // Store the result
    $stmt00->store_result();
    
    // Check if any records were found
    $exists = $stmt->num_rows > 0;
    
    $stmt00->close();
    return $exists;
}

?>