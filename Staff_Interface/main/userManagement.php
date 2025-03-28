<?php
include("main/connect.php");
include("main/functions.php");

// Function to generate a unique employee ID based on role
function generateEmployeeId($role) {
    global $connect;
    
    // Mapping roles to ID prefixes
    $rolePrefixes = [
        'admin' => 'emp_admin',
        'manager' => 'emp_mgr',
        'receptionist' => 'emp_recep',
        'mechanic' => 'emp_mech'
    ];

    $prefix = $rolePrefixes[$role] ?? 'emp_';
    
    // Find the highest existing ID for this role
    $sql = "SELECT MAX(CAST(SUBSTRING(employee_id, LENGTH('$prefix') + 1) AS UNSIGNED)) as max_id 
            FROM employees 
            WHERE employee_id LIKE '$prefix%'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    
    $newIdNumber = ($row['max_id'] ? $row['max_id'] + 1 : 1);
    $newEmployeeId = $prefix . $newIdNumber;

    return $newEmployeeId;
}

// Function to add a new user
function addNewUser($firstName, $lastName, $role, $basicSalary, $userPwd) {
    global $connect;
    
    // Start a transaction to ensure data integrity
    $connect->begin_transaction();

    try {
        // Generate unique employee ID
        $employeeId = generateEmployeeId($role);

        // Map role to role_id
        $roleIds = [
            'admin' => 'role_admin',
            'manager' => 'role_mgr',
            'receptionist' => 'role_recep',
            'mechanic' => 'role_mech'
        ];
        $roleId = $roleIds[$role];

        // Default secure password
        $defaultPassword = $userPwd;
        $passwordHash = simple_hash($defaultPassword);

        // Insert into employees table
        $sql1 = "INSERT INTO employees (`employee_id`, `role_id`, `emp_first_name`, `emp_last_name`, `basic_salary`) 
                 VALUES (?, ?, ?, ?, ?)";
        $stmt1 = $connect->prepare($sql1);
        $stmt1->bind_param("ssssd", $employeeId, $roleId, $firstName, $lastName, $basicSalary);
        $stmt1->execute();

        // Insert into system_access_control table
        $sql2 = "INSERT INTO system_access_control (`employee_id`, `role_id`, `password`) 
                 VALUES (?, ?, ?)";
        $stmt2 = $connect->prepare($sql2);
        $stmt2->bind_param("sss", $employeeId, $roleId, $passwordHash);
        $stmt2->execute();

        // Commit transaction
        $connect->commit();

        return [
            'success' => true, 
            'message' => "User $firstName $lastName added successfully. 
                          Employee ID: $employeeId. 
                          Default password: $defaultPassword",
            'employee_id' => $employeeId
        ];

    } catch (Exception $e) {
        // Rollback transaction on error
        $connect->rollback();
        return [
            'success' => false, 
            'message' => "Error adding user: " . $e->getMessage()
        ];
    }
}

// Function to remove a user
function removeUser($employeeId, $confirmEmployeeId) {
    global $connect;
    
    // Validate that both entered IDs match
    if ($employeeId !== $confirmEmployeeId) {
        return [
            'success' => false, 
            'message' => "Employee IDs do not match. Verification failed."
        ];
    }
    
    // Start a transaction to ensure data integrity
    $connect->begin_transaction();

    try {
        // Check if employee exists
        $checkSql = "SELECT * FROM employees WHERE `employee_id` = ?";
        $checkStmt = $connect->prepare($checkSql);
        $checkStmt->bind_param("s", $employeeId);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows === 0) {
            return [
                'success' => false, 
                'message' => "Employee ID $employeeId not found."
            ];
        }

        // Delete from system_access_control
        $sql1 = "DELETE FROM system_access_control WHERE `employee_id` = ?";
        $stmt1 = $connect->prepare($sql1);
        $stmt1->bind_param("s", $employeeId);
        $stmt1->execute();

        // Delete from employees
        $sql2 = "DELETE FROM employees WHERE `employee_id` = ?";
        $stmt2 = $connect->prepare($sql2);
        $stmt2->bind_param("s", $employeeId);
        $stmt2->execute();

        // Commit transaction
        $connect->commit();

        return [
            'success' => true, 
            'message' => "User with Employee ID $employeeId removed successfully."
        ];

    } catch (Exception $e) {
        // Rollback transaction on error
        $connect->rollback();
        return [
            'success' => false, 
            'message' => "Error removing user: " . $e->getMessage()
        ];
    }
}
?>