<!DOCTYPE html>
<html>
<head>
    <title>Create Players Table</title>
</head>
<body>

<h2>Create Players Table</h2>

<?php
// Database connection
$conn = new mysqli("localhost", "student1", "pass", "baseball_01");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE players (
    player_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    team VARCHAR(50),
    batting_avg DECIMAL(4,3),
    home_runs INT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'players' created successfully!";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

</body>
</html>