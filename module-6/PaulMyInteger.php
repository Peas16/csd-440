<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyInteger Class Demo</title>
</head>
<body>

<?php
/**
 * File: PaulMyInteger.php
 * Description: Demonstrates the use of a custom MyInteger class.
 * Author: Paul Fralix 
 * CSD440 Assignment 6.2
 * Date: 2026-04-17
 */
/**
 * Class: MyInteger
 * Description: Stores a single integer and provides methods
 * to determine if it is even, odd, or prime.
 */
class MyInteger {
    // Property to store the integer value
    private $value;

    /**
     * Constructor
     * Initializes the integer value
     */
    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * Getter method
     * Returns the current value
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Setter method
     * Updates the value
     */
    public function setValue($value) {
        $this->value = $value;
    }

    /**
     * Checks if a number is even
     */
    public function isEven() {
        return $this->value % 2 == 0;
    }

    /**
     * Checks if a number is odd
     */
    public function isOdd() {
        return $this->value % 2 != 0;
    }

    /**
     * Checks if a number is prime
     */
    public function isPrime() {
        if ($this->value <= 1) {
            return false;
        }

        for ($i = 2; $i <= sqrt($this->value); $i++) {
            if ($this->value % $i == 0) {
                return false;
            }
        }
        return true;
    }
}

/**
 * Function to display results
 */
function displayResults($obj) {
    echo "<h3>Testing Value: " . $obj->getValue() . "</h3>";

    echo "Even? " . ($obj->isEven() ? "Yes" : "No") . "<br>";
    echo "Odd? " . ($obj->isOdd() ? "Yes" : "No") . "<br>";
    echo "Prime? " . ($obj->isPrime() ? "Yes" : "No") . "<br><br>";
}

// Create two instances
$number1 = new MyInteger(10);
$number2 = new MyInteger(7);

// Test initial values
displayResults($number1);
displayResults($number2);

// Test setter method
$number1->setValue(13);
echo "<h2>After Updating First Object</h2>";
displayResults($number1);

?>

</body>
</html>