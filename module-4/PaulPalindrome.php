/********************************************************************
 * Palindrome Checker
 * Paul FRalix, 04/12/2026, CSD440 Assignment 4.2
 * Description:
 * This script defines a function to check if a given string is a palindrome.   
 * --------------------
 * This script checks if a given string is a palindrome.
 ********************************************************************/


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Palindrome Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        table {
            border-collapse: collapse;
            width: 60%;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Palindrome Checker Results</h2>

<?php
/**
 * Function: isPalindrome
 * ----------------------
 * Checks whether a given string is a palindrome.
 * A palindrome reads the same forward and backward.
 *
 * @param string $str The input string to evaluate
 * @return bool Returns true if palindrome, false otherwise
 */
function isPalindrome($str) {
    // Normalize string: remove spaces and convert to lowercase
    $cleanStr = strtolower(str_replace(' ', '', $str));

    // Reverse the string
    $reversedStr = strrev($cleanStr);

    // Compare original cleaned string with reversed string
    return $cleanStr === $reversedStr;
}

/**
 * Function: displayResult
 * ----------------------
 * Displays the original string, reversed string,
 * and whether it is a palindrome.
 *
 * @param string $str The input string
 */
function displayResult($str) {
    $reversed = strrev($str);
    $result = isPalindrome($str) ? "Palindrome" : "Not a Palindrome";

    echo "<tr>";
    echo "<td>$str</td>";
    echo "<td>$reversed</td>";
    echo "<td>$result</td>";
    echo "</tr>";
}

// Test strings (3 palindromes, 3 not)
$testStrings = [
    "racecar",     // palindrome
    "madam",       // palindrome
    "level",       // palindrome
    "hello",       // not
    "world",       // not
    "php"          // not
];
?>

<table>
    <tr>
        <th>Original String</th>
        <th>Reversed String</th>
        <th>Result</th>
    </tr>

    <?php
    // Loop through test cases and display results
    foreach ($testStrings as $string) {
        displayResult($string);
    }
    ?>
</table>

</body>
</html>