<?php
session_start();


if (isset($_POST['email']) && isset($_POST['password'])) {
    include 'db.php';
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($user && password_verify($password, $user['password'])) {
        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = $user['id'];
        echo "<script>alert('Login Success');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Login Failed');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="w3-center w3-blue-grey w3-padding-32">
        <h1>Clinic</h1>
    </header>
    <div style="min-height:66vh;overflow-y: auto;">
        <div class="w3-container w3-display-middle w3-light-grey w3-padding-large w3-round-large w3-card-4" style="max-width: 400px;">
            <h2 class="w3-center">Login</h2>
            <form id="loginForm" action="login.php" method="POST">
                <div class="w3-section">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="w3-input w3-border w3-round" id="email" name="email" required>
                </div>
                <div class="w3-section">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="w3-input w3-border w3-round" id="password" name="password" required>
                </div>
                <?php if (isset($error_message)): ?>
                    <p class="w3-text-red w3-center"><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>
                <button type="submit" class="w3-button w3-block w3-blue w3-round-large w3-padding">Login</button>
            </form>
            <div class="w3-center w3-margin-top">
                <p>Don't have an account? <a href="register.php" class="w3-button w3-green w3-round-large">Register</a></p>
            </div>
        </div> 
    </div>
    <!-- Footer -->
    <footer class="w3-container w3-center w3-blue-grey">
            <p>Copyright &copy;</p>
    </footer> 
</body>
</html>

