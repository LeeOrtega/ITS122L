<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad_email = $_POST['ad_email'];
    $ad_pass = $_POST['ad_pass'];
    
    // Database credentials
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $database = 'mushroom';
    
    
    $conn = mysqli_connect($host, $dbusername, $dbpassword, $database);
  
    $query = "SELECT * FROM admin_users WHERE ad_email = '$ad_email'";
    $result = mysqli_query($conn, $query);
    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($ad_pass, $admin['ad_pass'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['admin_id'];

        header('Location: admin_dashboard.php'); 
    } else {
        echo "Invalid username or password.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queen V Mushroom Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Welcome, Admin</h2>
            <p>Welcome back! Log in using your admin credentials to access the dashboard.</p>

            <?php if (isset($error_message)) : ?>
                <div class="alert">
                    <?= htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <input type="email" id="ad_email" name="ad_email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="ad_pass" name="ad_pass" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>

            <div class="register-link">
                <p>No account yet? <a href="register.php">Register Now</a></p>
            </div>
            <div class="register-link">
                <p>For Regular Users: <a href="login.php">LOGIN</a></p>
            </div>
        </div>
    </div>
</body>

</html>