<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'config.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) 
              VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $query);
    header('Location: login.php');
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
    <h4>Already have an Account? <a href="login.php">Log in</a></h4>
</form>