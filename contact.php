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
        header("Location: success.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Queen V Mushroom Farm</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="contactus.css" rel="stylesheet">
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
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="left-panel"></div>
        <div class="right-panel">
            <div class="form-container">
                <div class="form-logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="Logo">
                    </a>
                </div>
                <h2>Let's Get In Touch.</h2>
                <p>Or just reach out manually to <a href="mailto:queenvmushroomfarm@gmail.com">queenvmushroomfarm@gmail.com</a></p>
                <form action="#" method="POST">
                    <div class="input-row">
                        <div class="input-group">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="f_name" placeholder="First name" required>
                        </div>
                        <div class="input-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="l_name" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Email address" required>
                    </div>
                    <div class="input-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+63" required>
                    </div>
                    <div class="input-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Submit Form →</button>
                </form>
            </div>
        </div>
    </div>

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
