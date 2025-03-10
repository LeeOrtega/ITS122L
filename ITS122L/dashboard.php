<?php
session_start();
if (!isset($_SESSION['ad_email'])) {
    header('Location: adminlogin.php');
    exit();
}
include 'config.php';

$result = $conn->query("SELECT * FROM posts ORDER BY created_at ASC");
$posts = $result->fetch_all(MYSQLI_ASSOC);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admindashboard.css">

    <script>
        function showAddForm() {
            document.getElementById("postForm").reset();
            document.getElementById("post_id").value = "";
            document.getElementById("formTitle").innerText = "Add New Post";
            document.getElementById("formSection").style.display = "block";
        }

        function showEditForm(id, title, content) {
            document.getElementById("post_id").value = id;
            document.getElementById("title").value = title;
            document.getElementById("content").value = content;
            document.getElementById("formTitle").innerText = "Edit Post";
            document.getElementById("formSection").style.display = "block";
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="QueenV-logo.png" alt="Logo"> Admin Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </nav>

    <div class="newPost">
        <h2>Admin Panel</h2>
        <button onclick="showAddForm()">Add New Post</button>

        <div id="formSection" style="display: none;">
            <h3 id="formTitle">Add New Post</h3>
            <form id="postForm" method="POST" action="save_post.php">
                <input type="hidden" name="id" id="post_id">
                <label>Title:</label>
                <input type="text" name="title" id="title" required><br>
                <label>Content:</label>
                <textarea name="content" id="content" required></textarea><br>
                <button type="submit">Save Post</button>
            </form>
        </div>
    </div>
    
    <div class="Edit">
        <h3>Existing Posts</h3>
        <?php foreach ($posts as $post): ?>
            <div>
                <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                <p><?php echo htmlspecialchars($post['content']); ?></p>
                <button onclick="showEditForm('<?php echo $post['id']; ?>', '<?php echo htmlspecialchars($post['title']); ?>', '<?php echo htmlspecialchars($post['content']); ?>')">
                    Edit
                </button>
            </div>
        <?php endforeach; ?>
    </div>
    
</body>
</html>
