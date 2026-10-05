<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 1. DATABASE CONNECTION

$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}


// 2. INITIALIZE VARIABLES

$fname      = "";
$mname      = "";
$lname      = "";
$age        = "";
$gender     = "";
$email      = "";
$address    = "";
$contactnum = "";

$isSuccess = false;
$errorMsg  = "";

$req_type = ($_SERVER['REQUEST_METHOD'] === 'POST') ? '$_POST' : '$_GET';


// 3. HANDLE POST REQUEST (insert into DB, then redirect back to index.php)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname      = trim($_POST['fname'] ?? '');
    $mname      = trim($_POST['mname'] ?? '');
    $lname      = trim($_POST['lname'] ?? '');
    $age        = trim($_POST['age'] ?? '');
    $gender     = trim($_POST['gender'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $address    = trim($_POST['address'] ?? '');
    $contactnum = trim($_POST['contactnum'] ?? '');

    if ($fname === '' || $lname === '') {
        $errorMsg = "First name and last name are required.";
    } elseif (!is_numeric($age) || $age <= 0) {
        $errorMsg = "Please enter a valid age.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {

        $sql = "INSERT INTO persons
                (person_fname, person_mname, person_lname, person_age, person_gender, person_email, person_address, person_contactnum)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare Error: " . $conn->error);
        }

        // 8 values, 8 type letters: fname,mname,lname(s) age(i) gender,email,address,contactnum(s)
        $stmt->bind_param(
            "sssissss",
            $fname, $mname, $lname, $age, $gender, $email, $address, $contactnum
        );

        if ($stmt->execute()) {
            $isSuccess = true;
        } else {
            $errorMsg = "Insert Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();

    if ($isSuccess) {
        // Redirect back to index.php so the list of registered persons refreshes
        header("Location: index.php?status=success");
        exit;
    }

    // If there was an error, fall through and display it below on this page
}


// 4. HANDLE GET REQUEST (just display, no insert)

else {

    $fname      = $_GET['fname'] ?? '';
    $mname      = $_GET['mname'] ?? '';
    $lname      = $_GET['lname'] ?? '';
    $age        = $_GET['age'] ?? '';
    $gender     = $_GET['gender'] ?? '';
    $email      = $_GET['email'] ?? '';
    $address    = $_GET['address'] ?? '';
    $contactnum = $_GET['contactnum'] ?? '';

    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Output No. 3-4</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .success-msg {
            color: green;
            font-weight: bold;
        }

        .error-msg {
            color: red;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
        }

        td {
            padding: 5px;
        }
    </style>
</head>
<body>

    <h2>
        Data is sent here, and it is stored in the
        <?php echo htmlspecialchars($req_type); ?>
        variable
    </h2>

    <table>
        <tr><td width="140">First Name:</td><td><?php echo htmlspecialchars($fname); ?></td></tr>
        <tr><td>Middle Name:</td><td><?php echo htmlspecialchars($mname); ?></td></tr>
        <tr><td>Last Name:</td><td><?php echo htmlspecialchars($lname); ?></td></tr>
        <tr><td>Age:</td><td><?php echo htmlspecialchars($age); ?></td></tr>
        <tr><td>Gender:</td><td><?php echo htmlspecialchars($gender); ?></td></tr>
        <tr><td>Email:</td><td><?php echo htmlspecialchars($email); ?></td></tr>
        <tr><td>Address:</td><td><?php echo htmlspecialchars($address); ?></td></tr>
        <tr><td>Contact Number:</td><td><?php echo htmlspecialchars($contactnum); ?></td></tr>
    </table>

    <br>

    <?php if ($errorMsg !== ''): ?>
        <p class="error-msg"><?php echo htmlspecialchars($errorMsg); ?></p>
    <?php endif; ?>

    <br>

    <a href="index.php">Return to Main Form</a>

</body>
</html>