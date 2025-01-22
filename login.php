<?php
// Database connection
include('main/connect.php');

// Start session
session_start();

//verify existing session
if(isset($_SESSION['employee_id'])) {
    // echo "Welcome, user with ID: " . $_SESSION['employee_id'];
    header("Location: dashboard.php");
} else {
    //user login
    $errors = array();

    if ($_POST) {
        // Retrieve user input
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check user credentials
        if (empty($username) || empty($password)) {
            if ($username == "") {
                $errors[] = "Username is required";
            }

            if ($password == "") {
                $errors[] = "Password is required";
            }
        } else {
            // Use prepared statements to prevent SQL injection
            $stmt = $connect->prepare("SELECT * FROM system_access_control WHERE employee_id = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            // if ($result->num_rows == 1) {
            //     $value = $result->fetch_assoc();
            //     // Assuming the password is stored hashed
            //     if (password_verify($password, $value['password'])) {
            //         // Set session
            //         $_SESSION['employee_id'] = $value['employee_id'];
            //         echo "Login success!";
            //         header('Location: dashboard.php');
            //     } else {
            //         echo "Incorrect User Credentials";
            //     }
            // } else {
            //     echo "Username doesn't exist";
            // }

            if($result->num_rows == 1) {
                $value = $result->fetch_assoc();
                $_SESSION['employee_id'] = $value['employee_id'];
                echo "Login success";
                header('Location: dashboard.php');
            } else {
                echo "Incorrect credentials or user does not exist";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 1rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #666;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .remember-me input {
            margin-right: 0.5rem;
        }

        .remember-me label {
            color: #666;
            font-size: 0.9rem;
        }

        .login-button {
            width: 100%;
            padding: 0.75rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .login-button:hover {
            background: #5a6fe0;
        }

        .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .site-footer {
            background-color: rgba(26, 35, 126, 0.6);
            position: fixed; /* Fixes the footer to the bottom */
            left: 0;
            bottom: 0;
            width: 100%; /* Full width */
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: 700;
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 1rem;
                padding: 1.5rem;
            }

            .site-footer {
                margin-left: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h3>Welcome</h3>
            <h1>USHAN Motors</h1>
            <p>Please sign in to continue</p>
        </div>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="remember-me">
                <input type="checkbox" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit" class="login-button">Sign In</button>
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
        </form>
    </div>

    <footer class="site-footer"> 
        <p>&copy; 2024 Ushan Motors. All rights reserved.</p>
    </footer>
</body>
</html>