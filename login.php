<?php
$servername = "localhost"; 
$dbusername = "root"; 
$dbpassword = ""; 
$dbname = "user"; 

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if JSON data is received
$json_data = file_get_contents('php://input');
$data = json_decode($json_data);

// Prepare SQL statement
$sql = "INSERT INTO users (fname, lname, age, address, email) 
        VALUES (?, ?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiss", $data->fName, $data->lName, $data->age, $data->address, $data->email);

// Execute SQL statement
if ($stmt->execute()) {
    $response = array("success" => true, "message" => "New record created successfully");
    echo json_encode($response);
} else {
    $response = array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error);
    echo json_encode($response);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
