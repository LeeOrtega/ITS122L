<?php
session_start();
if (!isset($_SESSION['ad_email'])) {
    header('Location: adminlogin.php');
    exit();
}
include 'config.php';

// Fetch posts
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $result->fetch_all(MYSQLI_ASSOC);

// Fetch users
$query = "SELECT * FROM contacts";
$users_result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($users_result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admindashboard1.css">
    <script>
        function showAddForm() {
            document.getElementById("postForm").reset();
            document.getElementById("post_id").value = "";
            document.getElementById("existingImage").innerHTML = "";
            document.getElementById("formTitle").innerText = "Add New Post";
            document.getElementById("formSection").style.display = "block";
        }

        function showEditForm(id, title, content, image) {
            document.getElementById("post_id").value = id;
            document.getElementById("title").value = title;
            document.getElementById("content").value = content;


            document.getElementById("formTitle").innerText = "Edit Post";
            document.getElementById("formSection").style.display = "block";
        }

        function confirmDelete(id, type) {
            if (confirm("Are you sure you want to delete this " + type + "?")) {
                window.location.href = `delete_post.php?id=${id}&type=${type}`;
            }
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="Logo" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="main-content container-fluid p-4">
    <section id="posts">
        <h2 class="mb-4">Manage Posts</h2>
        <button class="btn btn-primary mb-3" onclick="showAddForm()">Add New Post</button>
        <div id="formSection" style="display: none;" class="card p-4 mb-4">
            <h3 id="formTitle">Add New Post</h3>
            <form id="postForm" method="POST" action="save_post.php" enctype="multipart/form-data">
                <input type="hidden" name="id" id="post_id">
                <input type="hidden" name="existing_image" id="existing_image">

                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                </div>
                <div id="existingImage" class="mb-3"></div>

                <button type="submit" class="btn btn-success">Save Post</button>
            </form>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post['id']; ?></td>
                            <td><?php echo htmlspecialchars($post['title']); ?></td>
                            <td>
                                <?php if (!empty($post['image'])): ?>
                                    <img src="img/<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image" width="100">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td><?php echo nl2br (htmlspecialchars($post['content'])); ?></td>
                            <td><?php echo $post['created_at']; ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="showEditForm('<?php echo $post['id']; ?>', '<?php echo htmlspecialchars($post['title']); ?>', '<?php echo htmlspecialchars($post['content']); ?>', '<?php echo htmlspecialchars($post['image']); ?>')">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $post['id']; ?>', 'post')">Delete</button>

                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="users" class="mt-5">
            <h2 class="mb-4">Manage Contacts</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['f_name']); ?></td>
                                <td><?php echo htmlspecialchars($user['l_name']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['phone']); ?></td>
                                <td><?php echo htmlspecialchars($user['message']); ?></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $user['id']; ?>', 'user')">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
