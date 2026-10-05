<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to DB just to fetch the list for display below the forms

$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$persons = [];

$result = $conn->query("SELECT * FROM persons ORDER BY person_lname, person_fname");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $persons[] = $row;
    }
    $result->free();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Output 3-4</title>
    <style>
        body {
            font-family: "Arial";
            margin: 20px;
        }

        .success-msg {
            color: green;
            font-weight: bold;
        }

        table.list-table {
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.list-table th,
        table.list-table td {
            border: 1px solid #ccc;
            padding: 6px 10px;
        }

        table.list-table th {
            background-color: #f0f0f0;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>PHP Output No. 3-4</h1>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
        <p class="success-msg">Record Successfully Inserted to Database!</p>
    <?php endif; ?>

    <fieldset>
        <legend>This form uses GET request</legend>
        <form action="redirect.php" method="GET">
        <table>
            <tr>
                <td>First Name</td>
                <td>
                    <input type="text" name="fname" placeholder="Enter First Name" required />
                </td>
            </tr>
            <tr>
                <td>Middle Name</td>
                <td>
                    <input type="text" name="mname" placeholder="Enter Middle Name" required />
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name="lname" placeholder="Enter Last Name" required />
                </td>
            </tr>
             <tr>
                <td>Age</td>
                <td>
                    <input type="number" name="age" placeholder="Enter Age" required />
                </td>
            </tr>
             <tr>
                <td>Gender</td>
                <td>
                    <input type="text" name="gender" placeholder="Enter Gender" required />
                </td>
            </tr>
             <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" placeholder="Enter Email" required />
                </td>
            </tr>
             <tr>
                <td>Address</td>
                <td>
                    <input type="text" name="address" placeholder="Enter Address" required />
                </td>
            </tr>
             <tr>
                <td>Contact Number</td>
                <td>
                    <input type="number" name="contactnum" placeholder="Enter ContactNumber" required />
                </td>
            </tr>
              <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit Data">
                    <input type="reset" value="Cancel">
                </td>
            </tr>
        </table>
        </form>
    </fieldset>

    <fieldset style="margin-top: 20px">
        <legend>This form uses POST request</legend>
        <form action="redirect.php" method="POST">
        <table>
            <tr>
                <td>First Name</td>
                <td>
                    <input type="text" name="fname" placeholder="Enter First Name" required />
                </td>
            </tr>
            <tr>
                <td>Middle Name</td>
                <td>
                    <input type="text" name="mname" placeholder="Enter Middle Name" required />
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name="lname" placeholder="Enter Last Name" required />
                </td>
            </tr>
                  <tr>
                <td>Age</td>
                <td>
                    <input type="number" name="age" placeholder="Enter Age" required />
                </td>
            </tr>
             <tr>
                <td>Gender</td>
                <td>
                    <input type="text" name="gender" placeholder="Enter Gender" required />
                </td>
            </tr>
             <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" placeholder="Enter Email" required />
                </td>
            </tr>
             <tr>
                <td>Address</td>
                <td>
                    <input type="text" name="address" placeholder="Enter Address" required />
                </td>
            </tr>
             <tr>
                <td>Contact Number</td>
                <td>
                    <input type="number" name="contactnum" placeholder="Enter ContactNumber" required />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit Data">
                    <input type="reset" value="Cancel">
                </td>
            </tr>
        </table>
        </form>
    </fieldset>

    <h2 style="margin-top: 30px;">List of Registered Persons</h2>

    <?php if (count($persons) === 0): ?>

        <p>No persons registered yet.</p>

    <?php else: ?>

        <table class="list-table">
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact Number</th>
            </tr>

            <?php foreach ($persons as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['person_fname']); ?></td>
                    <td><?php echo htmlspecialchars($p['person_mname']); ?></td>
                    <td><?php echo htmlspecialchars($p['person_lname']); ?></td>
                    <td><?php echo htmlspecialchars($p['person_age']); ?></td>
                    <td><?php echo htmlspecialchars($p['person_gender']); ?></td>
                    <td><?php echo htmlspecialchars($p['person_email']); ?></td>
                    <td><?php echo htmlspecialchars($p['person_address']); ?></td>
                    <td><?php echo htmlspecialchars($p['person_contactnum']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php endif; ?>

</body>
</html>