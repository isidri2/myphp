<?php

// Check if the request uses GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $fname = $_GET["fname"] ?? "";
    $mname = $_GET["mname"] ?? "";
    $lname = $_GET["lname"] ?? "";
    $age = $_GET["age"] ?? "";
    $gender = $_GET["gender"] ?? "";
    $email = $_GET["email"] ?? "";
    $address = $_GET["address"] ?? "";
    $contact = $_GET["contact"] ?? "";

    $method = "GET";

}

// Check if the request uses POST
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST["fname"] ?? "";
    $mname = $_POST["mname"] ?? "";
    $lname = $_POST["lname"] ?? "";
    $age = $_POST["age"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $email = $_POST["email"] ?? "";
    $address = $_POST["address"] ?? "";
    $contact = $_POST["contact"] ?? "";

    $method = "POST";

}

// If accessed directly
else {
    header("Location: index.php");
    exit();
}


// Basic PHP validation
if (
    empty($fname) ||
    empty($mname) ||
    empty($lname) ||
    empty($age) ||
    empty($gender) ||
    empty($email) ||
    empty($address) ||
    empty($contact)
) {
    echo "Please complete all required fields.";
    exit();
}


// Prevent HTML/script injection
$fname = htmlspecialchars($fname);
$mname = htmlspecialchars($mname);
$lname = htmlspecialchars($lname);
$age = htmlspecialchars($age);
$gender = htmlspecialchars($gender);
$email = htmlspecialchars($email);
$address = htmlspecialchars($address);
$contact = htmlspecialchars($contact);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Output 1 - Result</title>

    <style>

        body {
            font-family: Arial;
            background-color: #f2f2f2;
            margin: 30px;
        }

        .container {
            background-color: white;
            max-width: 650px;
            margin: auto;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #aaa;
        }

        h1 {
            text-align: center;
        }

        .method {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        td:first-child {
            font-weight: bold;
            width: 40%;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Submitted Information</h1>

    <p class="method">
        Request Method Used: <?php echo $method; ?>
    </p>

    <table>

        <tr>
            <td>First Name</td>
            <td><?php echo $fname; ?></td>
        </tr>

        <tr>
            <td>Middle Name</td>
            <td><?php echo $mname; ?></td>
        </tr>

        <tr>
            <td>Last Name</td>
            <td><?php echo $lname; ?></td>
        </tr>

        <tr>
            <td>Age</td>
            <td><?php echo $age; ?></td>
        </tr>

        <tr>
            <td>Gender</td>
            <td><?php echo $gender; ?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><?php echo $address; ?></td>
        </tr>

        <tr>
            <td>Contact Number</td>
            <td><?php echo $contact; ?></td>
        </tr>

    </table>

    <a href="index.php" class="back">Back to Form</a>

</div>

</body>

</html>