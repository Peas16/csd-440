<?php
/**
 * File: PaulCustomers.php
 * Description: Displays an array of customers and demonstrates searching
 *              using various array methods.
 * Author: Paul Fralix 
 * CSD440 Assignment 5.2
 * Date: 2026-04-17
 */

// ---------------------------
// 1. Define customer dataset
// ---------------------------
$customers = [
    [
        'first_name' => 'Alice',
        'last_name'  => 'Johnson',
        'age'        => 28,
        'phone'      => '555-111-2222'
    ],
    [
        'first_name' => 'Bob',
        'last_name'  => 'Smith',
        'age'        => 35,
        'phone'      => '555-222-3333'
    ],
    [
        'first_name' => 'Carol',
        'last_name'  => 'Davis',
        'age'        => 42,
        'phone'      => '555-333-4444'
    ],
    [
        'first_name' => 'David',
        'last_name'  => 'Miller',
        'age'        => 19,
        'phone'      => '555-444-5555'
    ],
    [
        'first_name' => 'Emma',
        'last_name'  => 'Wilson',
        'age'        => 31,
        'phone'      => '555-555-6666'
    ],
    [
        'first_name' => 'Frank',
        'last_name'  => 'Brown',
        'age'        => 27,
        'phone'      => '555-666-7777'
    ],
    [
        'first_name' => 'Grace',
        'last_name'  => 'Taylor',
        'age'        => 50,
        'phone'      => '555-777-8888'
    ],
    [
        'first_name' => 'Henry',
        'last_name'  => 'Anderson',
        'age'        => 23,
        'phone'      => '555-888-9999'
    ],
    [
        'first_name' => 'Ivy',
        'last_name'  => 'Thomas',
        'age'        => 37,
        'phone'      => '555-999-0000'
    ],
    [
        'first_name' => 'Jack',
        'last_name'  => 'Moore',
        'age'        => 45,
        'phone'      => '555-000-1111'
    ],
];

// --------------------------------------
// Helper function to display customers
// --------------------------------------
/**
 * Displays a table of customer records.
 *
 * @param array $records Array of customer associative arrays.
 * @param string $title  Section title to display above the table.
 */
function display_customers(array $records, string $title)
{
    if (empty($records)) {
        echo "<h2>{$title}</h2>";
        echo "<p>No matching customers found.</p>";
        return;
    }

    echo "<h2>{$title}</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Phone</th>
          </tr>";

    foreach ($records as $customer) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($customer['first_name']) . "</td>";
        echo "<td>" . htmlspecialchars($customer['last_name']) . "</td>";
        echo "<td>" . htmlspecialchars($customer['age']) . "</td>";
        echo "<td>" . htmlspecialchars($customer['phone']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

// --------------------------------------
// 2. Perform various searches
// --------------------------------------

// a) Find all customers with last name "Smith"
$smithCustomers = array_filter($customers, function ($c) {
    return $c['last_name'] === 'Smith';
});

// b) Find all customers older than 30
$over30Customers = array_filter($customers, function ($c) {
    return $c['age'] > 30;
});

// c) Find a single customer by phone number
$targetPhone = '555-777-8888';
$phoneIndex = array_search($targetPhone, array_column($customers, 'phone'));
$phoneCustomer = $phoneIndex !== false ? [$customers[$phoneIndex]] : [];

// d) Find all customers whose first name starts with 'A' (case-sensitive)
$startsWithA = array_filter($customers, function ($c) {
    return strpos($c['first_name'], 'A') === 0;
});

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paul Customers</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1, h2 { color: #333; }
        table { margin-bottom: 20px; border-collapse: collapse; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Customer Records</h1>

    <?php
    // 3. Display all customers
    display_customers($customers, "All Customers");

    // 4. Display search results
    display_customers($smithCustomers, "Customers with Last Name 'Smith'");
    display_customers($over30Customers, "Customers Older Than 30");
    display_customers($phoneCustomer, "Customer with Phone Number {$targetPhone}");
    display_customers($startsWithA, "Customers Whose First Name Starts with 'A'");
    ?>

</body>
</html>
