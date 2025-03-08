<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: login.php');
    exit;
}

include 'config.php';

// Securely fetch user data
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
<nav class="navbar">
      <div class="left-navbar">
        <h1 class="welcome">Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
      </div>
      <div class="logo">
        <a href="index.html">
            <img src="img/LOGO.png" alt="Logo" height="100px" width="auto">
        </a>


      </div>
      <div class="right-navbar">
        <ul>
          <li><a href="story.html">STORY</a></li>
          <li><a href="">DEVELOPMENT</a></li>
          <li><a href="">BLOG</a></li>
          <li><a href="">CONTACT</a></li>
        </ul>
      </div>
    </nav>
        
    </div>

    <footer>
    <div class="socmed">
        <a href="https://www.facebook.com/queen.v.mushroom.and.lettuce.farm/?fref=nf&pn_ref=story&_rdr" target="_blank">
            <img src="img/fb-icon.png" height="40px" width="auto">
        </a>
    </div>
    <div class="footer-content">
        <div class="footer-links">
            <a href=" ">JOIN US</a>
            <a href="story.html">STORY</a>
            <a href="development.html">DEVELOPMENT</a>
            <a href="blog.html">BLOG</a>
            <a href="donate.html">DONATE</a>
        </div>
        <div class="footer-address">
            <img src="img/LOGO.png" alt="Logo" height="100px" width="auto">
            <p>Pulilan, Bulacan</p>
        </div>
    </div>
</footer>

    
</body>
</html>