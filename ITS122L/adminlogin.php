<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'config.php';

    $ad_email = $_POST['ad_email'];
    $ad_pass = $_POST['ad_pass'];
    
    $query = "SELECT * FROM admin_users WHERE ad_email = '$ad_email'";
    $result = mysqli_query($conn, $query);
    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($ad_pass, $admin['ad_pass'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['admin_id'];

        header('Location: dashboard.php'); 
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Square&display=swap" rel="stylesheet">
    <link href="adminlogin.css" rel="stylesheet">

</head>
<body>

    <div class="container">
        <div class="left-panel">
            <div class="small-box">
            <h2>Fresh, Local, and Naturally Grown. <br> Connect. Explore. Enjoy.</h2>
            </div>
        </div>
        <div class="right-panel">
            <div class="form-container">
                <div class="logo">
                    <img src="QueenV-logo.png" alt="logo">
                </div>
                <h2>Sign in to Admin</h2>
                <form method="POST" action="dashboard.php">
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" class="btn">Sign In</button>
                </form>
                <p class="register-link">Not a member? <a href="signup.php">Sign up now</a></p>
            </div>
        </div>
    </div>
</body>
</html>
