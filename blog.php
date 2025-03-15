<?php
include 'config.php';

$query = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Queen V Mushrom Farm</title>
    <link rel="stylesheet" href="blog.css">
    <script src="firebase-config.js"></script>
    <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon.ico">
</head>
<body>

<div class="header">
    <nav class="navbar">

      
      <div class="logo">
        <a href="index.php">
            <img src="img/logo.png" alt="Logo" height="100px" width="auto">
        </a>
      </div>

      <div class="right-navbar">
        <ul>
          <li><a href="blog.php">BLOG</a></li>
          <li><a href="contact.html">CONTACT</a></li>
        </ul>
      </div>
    </nav>
  </div>

<main class="container">
    <div class="blog-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<article class='blog-post'>";
                if (!empty($row["image"])) {
                    echo "<div class='image-container'>";
                    echo "<img src='img/" . htmlspecialchars($row["image"]) . "' alt='Blog Image'>";
                    echo "</div>";
                }
                echo "<div class='content'>";
                echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
                echo "<p class='date'>" . date("F j, Y", strtotime($row["created_at"])) . "</p>";
                echo "<p class='excerpt'>" . nl2br(htmlspecialchars(strip_tags(substr($row["content"], 0, 200)))) . "...</p>";

                echo "</div>";
                echo "</article>";
            }
        } else {
            echo "<p class='no-posts'>No blog posts found.</p>";
        }

        $conn->close();
        ?>
    </div>
</main>

<footer>
    <div class="socmed">
        <a href="https://www.facebook.com/queen.v.mushroom.and.lettuce.farm/?fref=nf&pn_ref=story&_rdr" target="_blank">
            <img src="img/fb-icon.png" height="40px" width="auto">
        </a>
    </div>
    <div class="footer-content">
        <div class="footer-links">
            <a href="contact.php">JOIN US</a>
            <a href="blog.php">BLOG</a>
            <a href="adminlogin.php">ADMIN</a>
        </div>
        <div class="footer-address">
            <img src="img/logo.png" alt="Logo" height="200px" width="auto">
            <p>Sitio Manalili, Pulilan, 3005 Bulacan</p>
        </div>
    </div>
</footer>

</body>
</html>
