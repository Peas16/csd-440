<?php
/*
    File: PaulResponse.php
    Author: Paul Fralix CSD440 Assignment 7.2 04/26/2026
    Description: Validates form input and displays either an error list
                 or a formatted table of submitted data.
*/

function get_post($key) {
    return isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

$fullname   = get_post('fullname');
$email      = get_post('email');
$age        = get_post('age');
$income     = get_post('income');
$startdate  = get_post('startdate');
$department = get_post('department');
$emptype    = get_post('emptype');

$errors = [];

if ($fullname === '') $errors[] = "Full Name is required.";
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid Email Address is required.";
if ($age === '' || !ctype_digit($age) || $age < 1 || $age > 120) $errors[] = "Age must be a number between 1 and 120.";
if ($income === '' || !is_numeric($income) || $income < 0) $errors[] = "Monthly Income must be a non-negative number.";

if ($startdate === '') {
    $errors[] = "Start Date is required.";
} else {
    $d = DateTime::createFromFormat('Y-m-d', $startdate);
    if (!($d && $d->format('Y-m-d') === $startdate)) {
        $errors[] = "Start Date is invalid.";
    }
}

$valid_departments = ["IT", "HR", "Finance", "Marketing"];
if (!in_array($department, $valid_departments)) $errors[] = "Department selection is invalid.";

$valid_types = ["Full-Time", "Part-Time", "Contract"];
if (!in_array($emptype, $valid_types)) $errors[] = "Employment Type selection is invalid.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paul Form Response</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef1f5;
            padding: 30px;
        }

        .error-box {
            background: #ffe5e5;
            border: 1px solid #cc0000;
            padding: 15px;
            width: 500px;
            margin: 0 auto 20px auto;
            border-radius: 8px;
        }

        .success-container {
            background: #ffffff;
            width: 650px;
            margin: 0 auto;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.15);
            text-align: center;
        }

        .success-container h1 {
            color: #2a6ebb;
            margin-bottom: 10px;
        }

        .intro {
            font-size: 18px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th {
            background: #2a6ebb;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }

        .return-link {
            display: inline-block;
            padding: 10px 20px;
            background: #2a6ebb;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
        }

        .return-link:hover {
            background: #1f5491;
        }
    </style>
</head>
<body>

<?php if (!empty($errors)): ?>

    <div class="error-box">
        <h2>Form Submission Errors</h2>
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?php echo htmlspecialchars($e); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <p style="text-align:center;">
        <a class="return-link" href="PaulForm.html">Return to Form</a>
    </p>

<?php else: ?>

    <div class="success-container">
        <h1>Form Submitted Successfully</h1>
        <p class="intro">Here is the information you submitted:</p>

        <table>
            <tr><th>Field</th><th>Value</th></tr>
            <tr><td>Full Name</td><td><?php echo htmlspecialchars($fullname); ?></td></tr>
            <tr><td>Email</td><td><?php echo htmlspecialchars($email); ?></td></tr>
            <tr><td>Age</td><td><?php echo htmlspecialchars($age); ?></td></tr>
            <tr><td>Monthly Income</td><td>$<?php echo number_format($income, 2); ?></td></tr>
            <tr><td>Start Date</td><td><?php echo htmlspecialchars($startdate); ?></td></tr>
            <tr><td>Department</td><td><?php echo htmlspecialchars($department); ?></td></tr>
            <tr><td>Employment Type</td><td><?php echo htmlspecialchars($emptype); ?></td></tr>
        </table>

        <a class="return-link" href="PaulForm.html">Submit Another Response</a>
    </div>

<?php endif; ?>

</body>
</html>
