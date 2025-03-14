<?php
session_start();
include 'config.php';

// Check if ID is set
if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']); // Sanitize input

    // Retrieve the post to get the image filename
    $query = "SELECT image FROM posts WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $post = mysqli_fetch_assoc($result);

    if ($post) {
        // Delete the image file if it exists
        if (!empty($post['image'])) {
            $image_path = __DIR__ . "/uploads/" . $post['image'];
            if (file_exists($image_path)) {
                unlink($image_path); // Remove the file
            }
        }

        // Delete the post from the database
        $delete_query = "DELETE FROM posts WHERE id = ?";
        $delete_stmt = mysqli_prepare($conn, $delete_query);
        mysqli_stmt_bind_param($delete_stmt, "i", $post_id);
        if (mysqli_stmt_execute($delete_stmt)) {
            header("Location: dashboard.php?message=Post deleted successfully");
            exit();
        } else {
            echo "Error deleting post: " . mysqli_error($conn);
        }
    } else {
        echo "Post not found.";
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $sql = "DELETE FROM contacts WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            header("Location: dashboard.php?success=deleted");
                exit();
        } else {
                echo "Error deleting contact: " . $stmt->error;
        }
        
        $stmt->close();
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
