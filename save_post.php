<?php
session_start();
include 'config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $post_id = isset($_POST['id']) && !empty($_POST['id']) ? intval($_POST['id']) : null;
    $image = "";

    // Ensure 'img/' folder exists
    $target_dir = __DIR__ . "/img/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);  // Create folder if missing
    }

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = time() . '_' . basename($_FILES['image']['name']);
        $target_file = $target_dir . $image;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the uploaded file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            die("Error: The file is not a valid image.");
        }

        // Allow only certain file formats
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_types)) {
            die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            die("Error: Failed to upload image. Check folder permissions.");
        }
    }

    if ($post_id) {
        // **UPDATE EXISTING POST**
        if (!empty($image)) {
            // Delete old image first
            $query = "SELECT image FROM posts WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $post_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $post = mysqli_fetch_assoc($result);

            if ($post && !empty($post['image'])) {
                $old_image_path = __DIR__ . "/img/" . $post['image'];
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            // Update post including new image
            $sql = "UPDATE posts SET title = ?, content = ?, image = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $image, $post_id);
        } else {
            // Update post without changing image
            $sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $post_id);
        }
    } else {
        // **INSERT NEW POST**
        $sql = "INSERT INTO posts (title, content, image, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $title, $content, $image);
    }

    if (mysqli_stmt_execute($stmt)) {
        header("Location: dashboard.php?message=Post saved successfully");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
