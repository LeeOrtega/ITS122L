<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'config.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
    } else {
        echo "Invalid login credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<head> 
    <title>Login</title>
</head>
<body>
    <h1>Login Now</h1>
    <form method="POST">
        <label>Username: </label>
        <input  type="text" name="username" placeholder="Username" required>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Email" required>
        <label>Password:</label>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>

        <h4>No Profile Yet? <a href="registration.php">Register Now</a></h4>

    </form>
</body>
</html>