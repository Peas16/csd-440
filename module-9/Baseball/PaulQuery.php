<!DOCTYPE html>
<html>

<head>
    <title>Search Players</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1e3a5f;
            color: white;
            text-align: center;
            padding: 20px;
        }

        nav {
            background-color: #2c5282;
            padding: 12px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 15px;
            font-weight: bold;
        }

        nav a:hover {
            color: #ffd166;
        }

        .container {
            width: 80%;
            margin: auto;
            margin-top: 30px;
        }

        .card {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
        }

        select {
            width: 20%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        input[type=submit] {
            background-color: #1e3a5f;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #16324a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th {
            background-color: #1e3a5f;
            color: white;
            padding: 12px;
        }

        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .error {
            color: red;
            font-weight: bold;
        }

    </style>

</head>

<body>

<header>
    <h1>Search Baseball Players</h1>
</header>

<nav>
    <a href="PaulIndex.php">Home</a>
    <a href="PaulForm.php">Add Player</a>
    <a href="PaulQuery.php">Search Players</a>
</nav>

<div class="container">

<div class="card">

<?php

// Author: Paul Fralix
// Course:CSD440 Module 9.2 Assignment
// Description: This page allows users to search baseball
// players by selecting a team from a dropdown menu.

// Database connection
$conn = new mysqli("localhost", "student1", "pass", "baseball_01");

// Check connection
if ($conn->connect_error) {
    die("<p class='error'>Connection failed: " . $conn->connect_error . "</p>");
}

// Query unique team names
$teamQuery = "SELECT DISTINCT team FROM players ORDER BY team";
$teamResult = $conn->query($teamQuery);

?>

<h2>Search Players by Team</h2>

<form method="post" action="">

    <label>Select a Team</label>

    <select name="team" required>

        <option value="">-- Choose Team --</option>

        <?php
        while($teamRow = $teamResult->fetch_assoc()) {
            echo "<option value='" . $teamRow['team'] . "'>"
                 . $teamRow['team'] .
                 "</option>";
        }
        ?>

    </select>

    <input type="submit" name="search" value="Search">

</form>

<?php

// Process search request
if (isset($_POST['search'])) {

    $team = $_POST['team'];

    $sql = "SELECT * FROM players WHERE team = '$team'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        echo "<table>";

        echo "<tr>
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
        echo "<p class='error'>No results found.</p>";
    }
}

$conn->close();

?>

</div>
</div>

</body>
</html>