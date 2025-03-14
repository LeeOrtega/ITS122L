<?php
include 'config.php';

// Ensure the script runs only when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if all required fields exist
    $f_name = isset($_POST['f_name']) ? trim($_POST['f_name']) : null;
    $l_name = isset($_POST['l_name']) ? trim($_POST['l_name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
    $message = isset($_POST['message']) ? trim($_POST['message']) : null;




    // Prepare and execute SQL statement
    $sql = "INSERT INTO contacts (f_name, l_name, email, phone, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $f_name, $l_name, $email, $phone, $message);

    if ($stmt->execute()) {
        header('Location: success.html');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
