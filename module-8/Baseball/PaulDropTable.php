<!DOCTYPE html>
<html>
<head>
    <title>Drop Players Table</title>
</head>
<body>

<h2>Drop Players Table</h2>

<?php
$conn = new mysqli("localhost", "student1", "pass", "baseball_01");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DROP TABLE IF EXISTS players";

if ($conn->query($sql) === TRUE) {
    echo "Table dropped successfully!";
} else {
    echo "Error dropping table: " . $conn->error;
}

$conn->close();
?>

</body>
</html>