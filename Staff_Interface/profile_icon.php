<?php
$empId = $_SESSION['employee_id'];
$firstName = "";
$lastName = "";

//get all mechanics from the table
$stmt = $connect->prepare("SELECT `emp_first_name`, `emp_last_name` FROM employees WHERE `employee_id`='".$empId."' LIMIT 1;");
$stmt->execute();
$stmt->bind_result($firstName, $lastName);
// Initialize variables to hold the results
$results = [];
while ($stmt->fetch()) {
    $results[] = [
        'emp_first_name' => $firstName,
        'emp_last_name' => $lastName
    ];
}
$stmt->close();

// Check if there are no appointments
if (empty($results)) {
    $empId = "";
    $firstName = "";
    $lastName = "";
} else {
    // If there are results, access them
    foreach ($results as $result) {
        $firstName = $result['emp_first_name'];
        $lastName = $result['emp_last_name'];
        
        // Process each result
        echo "
        <div>
            <a href='#' class='user-profile' onclick='toggleDropdown(event)'>
                <div class='user-avatar'>".$firstName[0].$lastName[0]."</div>
                <div class='user-name'>".$firstName." ".$lastName."</div>
            </a>
            <div class='dropdown-menu' id='dropdownMenu'>
                <a href='settings.php'>Settings</a>
                <a href='logout.php'>Logout</a>
            </div>
        </div>
        ";
    }
}

?>