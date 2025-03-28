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

//hash strings
function simple_hash($input_string) {
    $result = '';
    $shift = strlen($input_string) % 26; // Derive shift value from string length
    
    // Process each character
    for ($i = 0; $i < strlen($input_string); $i++) {
        $char = $input_string[$i];
        $ascii = ord($char);
        
        // Apply transformation
        $transformed = $ascii + $shift;
        
        // Convert to hex and append to result
        $result .= dechex($transformed);
    }
    
    return $result;
}

//dehash strings
function simple_dehash($hashed_string) {
    $result = '';
    $hex_pairs = str_split($hashed_string, 2);
    
    // First, convert hex pairs to ASCII values
    $ascii_values = array_map('hexdec', $hex_pairs);
    
    // Calculate shift value - need to do this after first character is processed
    $first_char_ascii = $ascii_values[0];
    $shift = count($ascii_values) % 26;
    
    // Process each value
    foreach ($ascii_values as $ascii) {
        // Reverse the transformation
        $original_ascii = $ascii - $shift;
        
        // Convert back to character
        $result .= chr($original_ascii);
    }
    
    return $result;
}

function passwordVerify($inputPassword, $storedPassword) {
    // Debug: Print out the input and stored passwords
    error_log("Input Password: " . $inputPassword);
    error_log("Stored Password: " . $storedPassword);

    // Use simple_hash for verification
    $hashedInput = simple_hash($inputPassword);
    
    // Direct comparison
    $result = ($hashedInput === $storedPassword);
    
    error_log("Verification Result: " . ($result ? 'True' : 'False'));
    
    return $result;
}

?>