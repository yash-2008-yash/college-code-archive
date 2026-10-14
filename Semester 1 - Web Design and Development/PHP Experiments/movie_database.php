<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'movie_db';

// try catch block
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the POD error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully <BR>';
} catch (PDOException $e) {
    echo 'Connection failed:', $e->getMessage();
}

// Perform DB operations here
$query = 'SELECT * FROM movies';
$result = $conn->query($query);
foreach ($result as $item) {
    echo '<BR>' . '<B>Movie Name:</B> ' . $item['Movie Name'] . '<BR>' . '<B>Released Year:</B> ' . $item['Released Year'] . '<BR>' . '<B>Director:</B> ' . $item['Director'] . '<BR>' . '<B>IMDb Rating:</B> ' . $item['IMDb Rating'] . '<BR><BR>';
}

// Close connection (optional for PDO, as it"s automatically closed when script ends)
$conn = null;
?>