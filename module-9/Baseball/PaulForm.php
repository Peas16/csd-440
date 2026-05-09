<!DOCTYPE html>
<html>

<head>
    <title>Add Player</title>

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

        h2 {
            text-align: center;
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

            max-width: 450px;
            margin: auto;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        input[type=text],
        input[type=number] {
            width: 100%;
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

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

    </style>

</head>

<body>

<header>
    <h1>Add Baseball Player</h1>
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
// Description: This page allows users to add baseball players
// into the players table.

// Database connection
$conn = new mysqli("localhost", "student1", "pass", "baseball_01");

// Check connection
if ($conn->connect_error) {
    die("<p class='error'>Connection failed: " . $conn->connect_error . "</p>");
}

// Process form submission
if (isset($_POST['submit'])) {

    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $team = $_POST['team'];
    $avg = $_POST['batting_avg'];
    $hr = $_POST['home_runs'];

    $sql = "INSERT INTO players
            (first_name, last_name, team, batting_avg, home_runs)
            VALUES
            ('$first', '$last', '$team', '$avg', '$hr')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Player added successfully!</p>";
    } else {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }
}

?>

<h2>Add New Player</h2>

<form method="post" action="">

    <label>First Name</label>
    <input type="text" name="first_name" required>

    <label>Last Name</label>
    <input type="text" name="last_name" required>

    <label>Team</label>
    <input type="text" name="team">

    <label>Batting Average</label>
    <input type="text" name="batting_avg">

    <label>Home Runs</label>
    <input type="number" name="home_runs">

    <input type="submit" name="submit" value="Add Player">

</form>

</div>
</div>

</body>
</html>