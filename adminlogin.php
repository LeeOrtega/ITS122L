<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad_email = $_POST['ad_email'];
    $ad_pass = $_POST['ad_pass'];
    
    include 'config.php';
    
    // Check for connection errors
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
     $query = "SELECT * FROM admin_users WHERE BINARY ad_email = ? AND BINARY ad_pass = ?";
     $stmt = mysqli_prepare($conn, $query);
     mysqli_stmt_bind_param($stmt, "ss", $ad_email, $ad_pass);
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
     
     if ($row = mysqli_fetch_assoc($result)) {
         $_SESSION['ad_email'] = $ad_email;
         header('Location: dashboard.php'); 
         exit();
     } else {
         echo "<script>alert('Invalid username or password. ')</script>";
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
    <title>Admin Login</title>
    <link href="adminlogin.css" rel="stylesheet">
    <script src="firebase-config.js"></script>
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
                    
                    <a href="index.php"><img src="img/QueenV-logo.png" alt="logo"></a>
                </div>
                <h2>Sign in to Admin</h2>
                <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="email" name="ad_email" placeholder="Email Address" required>
                    <input type="password" name="ad_pass" placeholder="Password" required>
                    <button type="submit" class="btn">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
