<!DOCTYPE html>
<html>

<head>
    <title>Baseball Database Home</title>

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

        ul {
            line-height: 2;
        }

    </style>

</head>

<body>

<header>
    <h1>Baseball Player Database</h1>
</header>

<nav>
    <a href="PaulIndex.php">Home</a>
    <a href="PaulForm.php">Add Player</a>
    <a href="PaulQuery.php">Search Players</a>
</nav>

<div class="container">

    <div class="card">

        <h2>Welcome</h2>

        <p>
            This application allows users to add and search
            baseball player records using PHP and MySQLi.
        </p>

        <ul>
            <li>Add new player records</li>
            <li>Search players by team</li>
            <li>Display formatted database results</li>
        </ul>

    </div>

</div>

</body>
</html>