<?php
include 'config.php';

// Ensure the script runs only when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if all required fields exist
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];



    // Prepare and execute SQL statement
    $sql = "INSERT INTO contacts (f_name, l_name, email, phone, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $f_name, $l_name, $email, $phone, $message);

    if ($stmt->execute()) {
        header('location: success.html');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
