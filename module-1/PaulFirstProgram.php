<!--
    File Name: PaulFirstProgram.php
    Author: Paul Fralix
    Course: CSD440 Server-Side Scripting
    Date: 2026-29-03   
    Assignment: Module 1.3
    Description: This is my first PHP program using XAMPP.
                 It demonstrates PHP output, variables,
                 and standard HTML structure.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First Program Using PHP</title>
</head>
<body>

    <h1>Welcome to My First Program Using PHP</h1>
    <p>If you are seeing this page, PHP is running correctly on XAMPP.</p>

    <?php
        // PHP Snippet #1: Basic output
        echo "<h2>PHP Output Section</h2>";
        echo "This line was generated using PHP.<br>";

        // PHP Snippet #2: Variables and string concatenation
        $student = "Paul";
        $course = "Server-Side Scripting with PHP";
        echo "Hello, my name is " . $student . " and I am learning " . $course . ".<br>";
    ?>

    <p>Everything above this line was generated with PHP code.</p>

</body>
</html>