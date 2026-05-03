<!DOCTYPE html>
<html>
<head>
    <title>Populate Players Table</title>
</head>
<body>

<h2>Insert Data into Players Table</h2>

<?php
$conn = new mysqli("localhost", "student1", "pass", "baseball_01");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert sample data
$sql = "INSERT INTO players (first_name, last_name, team, batting_avg, home_runs)
VALUES
('Mike', 'Trout', 'Angels', 0.301, 350),
('Aaron', 'Judge', 'Yankees', 0.287, 257),
('Mookie', 'Betts', 'Dodgers', 0.294, 250),
('Freddie', 'Freeman', 'Dodgers', 0.300, 300),
('Ronald', 'Acuna', 'Braves', 0.292, 165)";

if ($conn->query($sql) === TRUE) {
    echo "Records inserted successfully!";
} else {
    echo "Error inserting data: " . $conn->error;
}

$conn->close();
?>

</body>
</html>