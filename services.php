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

include 'db.php';

try {
    $stmt = $conn->prepare("SELECT * FROM tbl_services");
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
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
    <div style="min-height:60vh;overflow-y: auto;">
        <div class="w3-container w3-padding-32">
        <h2>Our Services</h2>
        <div class="w3-row-padding">
        <?php foreach ($services as $service): ?>
                <div class="w3-third w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <header class="w3-container w3-light-grey">
                            <h3><?php echo htmlspecialchars($service['service_name']); ?></h3>
                        </header>
                        <div class="w3-container">
                            <!-- Image for the service -->
                            <p id="service-info-<?php echo $service['service_id']; ?>" style="display: none;">
                                <?php echo htmlspecialchars($service['service_description']); ?><br>
                                <b>Price: </b>$<?php echo htmlspecialchars($service['service_price']); ?>
                            </p>
                            <button onclick="showServiceInfo(<?php echo $service['service_id']; ?>)" class="w3-button w3-block w3-blue w3-round-large w3-padding">Show Details</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>   
    </div>
    <!-- Footer Section -->
    <footer class="w3-container w3-center w3-blue-grey">
            <p>Copyright &copy;</p>
    </footer> 
    <script>
        function showServiceInfo(serviceId) {
            var info = document.getElementById('service-info-' + serviceId);
            if (info.style.display === 'none') {
                info.style.display = 'block';
            } else {
                info.style.display = 'none';
            }
        }
    </script>
</body>
</html>
