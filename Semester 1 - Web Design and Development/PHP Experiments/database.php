<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_db";

// try catch block
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the POD error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully <BR>";
} catch (PDOException $e) {
    echo "Connection failed:", $e->getMessage();
}

// Perform DB operations here
$query = "SELECT * FROM test";
$result = $conn->query($query);
foreach ($result as $item) {
    echo "[" . $item["Name"] . "]" . "[" . $item["Roll Number"] . "]" . "[" . $item["Age"] . "]" . "[" . $item["Phone Number"] . "]" . "<BR>";
}

// Close connection (optional for PDO, as it"s automatically closed when script ends)
$conn = null;
?>