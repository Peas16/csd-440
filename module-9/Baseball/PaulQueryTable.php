<!DOCTYPE html>
<html>
<head>
    <title>Query Players Table</title>
</head>
<body>

<h2>Players List</h2>

<?php
$conn = new mysqli("localhost", "student1", "pass", "baseball_01");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Team</th>
                <th>Batting Avg</th>
                <th>Home Runs</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['player_id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['team']}</td>
                <td>{$row['batting_avg']}</td>
                <td>{$row['home_runs']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>

</body>
</html>