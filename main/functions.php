<?php
function generateFiveDigitNumber() {
    // Generate a random number between 10000 and 99999
    $number = rand(10000, 99999);
    return $number;
}

function checkItemExists($connection, $itemName, $tableName, $column_name) {
    // Prepare the SQL statement
    $stmt = $connection->prepare("SELECT * FROM `$tableName` WHERE `$column_name` = ?");
    
    // Bind the parameter
    $stmt->bind_param("s", $itemName);
    
    // Execute the statement
    $stmt->execute();
    
    // Store the result
    $stmt->store_result();
    
    // Check if any records were found
    $exists = $stmt->num_rows > 0;
    
    $stmt->close();
    return $exists;
}
?>