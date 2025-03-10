<?php
include 'config.php';

$query = "SELECT * FROM posts ORDER BY created_at ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <style>
        body { 
    font-family: 'Poppins', sans-serif; 
    margin: 0; 
    padding: 20px; 
    background: #f4f4f4; 
    display: flex; 
    justify-content: center; 
}
.container { 
    max-width: 900px; 
    width: 100%;
    background: white; 
    padding: 20px; 
    border-radius: 10px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
h1 { 
    text-align: center; 
    color: #333; 
    margin-bottom: 20px;
}
.blog-post { 
    background: #fff; 
    border-radius: 10px; 
    padding: 20px; 
    margin-bottom: 20px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}
.blog-post:hover {
    transform: scale(1.02);
}
.blog-post h2 { 
    margin-bottom: 10px; 
    color: #222;
}
.blog-post img { 
    width: 100%; 
    height: auto; 
    border-radius: 8px; 
    margin-bottom: 15px;
}
.blog-post p { 
    color: #555; 
    line-height: 1.6;
}
.no-posts {
    text-align: center;
    color: #777;
    font-size: 18px;
}
    </style>
</head>
<body>

<div class="container">
    <h1>My Blog</h1>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='blog-post'>";
            echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
            if (!empty($row["image"])) {
                echo "<img src='http://localhost/blog/img/" . htmlspecialchars($row["image"]) . "' alt='Blog Image'>";
            }
            echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No blog posts found.</p>";
    }

    // Close connection
    $conn->close();
    ?>

</div>

</body>
</html>