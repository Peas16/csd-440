<?php
// Author: Paul Fralix
// Course: CSD440 Assignment 10.2
// File: PaulJSON.php
// Description:
// This program collects user information from a form,
// validates the input, converts the data into JSON format
// using json_encode(), and displays the formatted JSON output.

// Initialize variables
$error = "";
$jsonOutput = "";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and trim form data
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip = trim($_POST['zip']);
    $favoriteColor = trim($_POST['favoriteColor']);

    // Validate fields
    if (
        empty($firstName) || empty($lastName) ||
        empty($email) || empty($phone) ||
        empty($city) || empty($state) ||
        empty($zip) || empty($favoriteColor)
    ) {

        $error = "ERROR: All fields are required.";

    } else {

        // Create associative array
        $userData = array(
            "First Name" => $firstName,
            "Last Name" => $lastName,
            "Email" => $email,
            "Phone" => $phone,
            "City" => $city,
            "State" => $state,
            "ZIP Code" => $zip,
            "Favorite Color" => $favoriteColor
        );

        // Convert array to JSON format
        $jsonOutput = json_encode($userData, JSON_PRETTY_PRINT);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paul JSON Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 40px;
        }

        .container {
            width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        .json-output {
            background-color: #272822;
            color: #00ff99;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            white-space: pre-wrap;
            font-family: Consolas, monospace;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>User Information Form</h1>

    <form method="post" action="PaulJSON.php">

        <label>First Name:</label>
        <input type="text" name="firstName">

        <label>Last Name:</label>
        <input type="text" name="lastName">

        <label>Email:</label>
        <input type="email" name="email">

        <label>Phone Number:</label>
        <input type="text" name="phone">

        <label>City:</label>
        <input type="text" name="city">

        <label>State:</label>
        <input type="text" name="state">

        <label>ZIP Code:</label>
        <input type="text" name="zip">

        <label>Favorite Color:</label>
        <input type="text" name="favoriteColor">

        <input type="submit" value="Submit Information">

    </form>

    <?php
    // Display error message if validation fails
    if (!empty($error)) {
        echo "<div class='error'>$error</div>";
    }

    // Display JSON output if successful
    if (!empty($jsonOutput)) {
        echo "<h2>JSON Encoded Output</h2>";
        echo "<div class='json-output'>$jsonOutput</div>";
    }
    ?>

</div>

</body>
</html>