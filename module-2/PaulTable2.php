<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Number Table</title>

    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 50px;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>PHP Generated Random Number Table</h2>

<table>

<?php
/********************************************************************
 * File Name: PaulTable2.php
 * Author: Paul Fralix CSD440 Assignment 2.2
 * Date: 04/04/2026
 * Description:
 * This program generates a two-dimensional HTML table using
 * nested PHP loops. Each cell is populated with a random number.
 ********************************************************************/

// Define number of rows and columns
$rows = 5;
$cols = 5;

// Outer loop for rows
for ($i = 0; $i < $rows; $i++) {
?>
    <tr>
<?php
    // Inner loop for columns
    for ($j = 0; $j < $cols; $j++) {
        // Generate random number between 1 and 100
        $randomNumber = rand(1, 100);
?>
        <td><?php echo $randomNumber; ?></td>
<?php
    }
?>
    </tr>
<?php
}
?>

</table>

</body>
</html>