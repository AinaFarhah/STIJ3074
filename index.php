<?php
session_start();


// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// Retrieve user information if needed
$user_email = $_SESSION["email"];
$user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic mainpage</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="w3-center w3-blue-grey w3-padding-32">
        <h1>Clinic</h1>
        <p>Welcome to Our Clinic</p>
    </header>
    <!-- Menu Bar -->
    <nav class="w3-bar w3-blue-grey">
        <a href="index.php" class="w3-bar-item w3-button w3-mobile">Home</a>
        <a href="services.php" class="w3-bar-item w3-button w3-mobile">Services</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-mobile w3-right">Logout</a>
    </nav>

    <div style="min-height:54vh;overflow-y: auto; ">
        <div class="w3-container w3-display-middle w3-light-grey w3-padding-large w3-round-large w3-card-4" style="max-width: 400px;">
            <p>This is the main page of our clinic's system.</p>
        </div>

    </div>
    <!-- Footer Section -->
    <footer class=" w3-container w3-center w3-blue-grey ">
            <p>Copyright &copy</p>
    </footer>    
</body>
</html>
