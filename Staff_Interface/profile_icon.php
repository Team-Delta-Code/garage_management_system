<?php
$empId = $_SESSION['employee_id'];
$firstName = "";
$lastName = "";
$roleId = "";
$role = "";

//get all mechanics from the table
$stmt = $connect->prepare("SELECT `emp_first_name`, `emp_last_name`, `role_id` FROM employees WHERE `employee_id`='".$empId."' LIMIT 1;");
$stmt->execute();
$stmt->bind_result($firstName, $lastName, $roleId);
// Initialize variables to hold the results
$results = [];
while ($stmt->fetch()) {
    $results[] = [
        'emp_first_name' => $firstName,
        'emp_last_name' => $lastName,
        'role_id' => $roleId
    ];
}
$stmt->close();

if (empty($results)) {
    $empId = "";
    $firstName = "";
    $lastName = "";
    $roleId = "";
} else {
    // If there are results, access them
    foreach ($results as $result) {
        $firstName = $result['emp_first_name'];
        $lastName = $result['emp_last_name'];
        $roleId = $result['role_id'];
        if($roleId == "role_admin"){
            $role = "System Administrator";
        }else if($roleId == "role_mech"){
            $role = "Mechanic";
        }else if($roleId == "role_recep"){
            $role = "Receptionist";
        }else if($roleId == "role_mgr"){
            $role = "Manager";
        }else {
            $role = "404: Role not found";
        }
        
        // Process each result
        echo "
        <div>
            <a href='#' class='user-profile' onclick='toggleDropdown(event)'>
                <div class='user-avatar' style='z-index:1000'>".$firstName[0].$lastName[0]."</div>
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