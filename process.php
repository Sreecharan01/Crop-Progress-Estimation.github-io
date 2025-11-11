<?php
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";  // Change if needed
$dbname = "crop_estimation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crop_name = $_POST['crop_name'];
    $sowing_date = $_POST['sowing_date'];
    $growth_duration = $_POST['growth_duration'];

    $estimated_harvest = date('Y-m-d', strtotime($sowing_date . " + $growth_duration days"));

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO crops (crop_name, sowing_date, growth_duration, estimated_harvest) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $crop_name, $sowing_date, $growth_duration, $estimated_harvest);
    $stmt->execute();
    $stmt->close();

    echo "Estimated Harvest Date: " . $estimated_harvest;
}

$conn->close();
?>
