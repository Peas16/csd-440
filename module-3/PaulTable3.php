<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Function</title>

    <style>
        table {
            border-collapse: collapse;
            margin: 40px auto;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 90px;
        }
        h2 {
            text-align: center;
        }
        p {
            text-align: center;   
        }
    </style>
</head>
<body>

<h2>PHP Table Using External Function</h2>
<p> Refresh the page to generate new random numbers and sums. </p>

<?php
/********************************************************************
 * File Name: PaulTable3.php
 * Author: Paul Fralix CSD440 Assignment 3.2
 * Date: 04/04/2026
 * Description:
 * This program generates an HTML table using nested loops.
 * Each cell displays the sum of two randomly generated numbers.
 * The addition is performed by a function stored in an external file.
 ********************************************************************/

// Include external function file
require 'PaulFunctions.php';

// Define table size
$rows = 5;
$cols = 5;
?>

<table>

<?php
// Outer loop (rows)
for ($i = 0; $i < $rows; $i++) {
?>
    <tr>
<?php
    // Inner loop (columns)
    for ($j = 0; $j < $cols; $j++) {

        // Generate two random numbers
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);

        // Call function from external file
        $sum = addNumbers($num1, $num2);
?>
        <td>
            <?php echo $num1 . " + " . $num2 . " = " . $sum; ?>
        </td>
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