<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Faculty</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table td { padding: 6px; }
        input[type="text"], input[type="number"], select { padding: 5px; width: 250px; }
        .error-msg { color: red; }
        .btn { padding: 8px 14px; }
    </style>
</head>
<body>

    <h1>Add New Faculty</h1>

    <?php if (!empty($errors)): ?>
        <ul class="error-msg">
            <?php foreach ($errors as $err): ?>
                <li><?php echo htmlspecialchars($err); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="index.php?action=create">
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname" value="<?php echo htmlspecialchars($data['fname']); ?>" required></td>
            </tr>
            <tr>
                <td>Middle Name:</td>
                <td><input type="text" name="mname" value="<?php echo htmlspecialchars($data['mname']); ?>"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname" value="<?php echo htmlspecialchars($data['lname']); ?>" required></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" name="age" min="18" max="100" value="<?php echo htmlspecialchars($data['age']); ?>" required></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <select name="gender" required>
                        <option value="">-- Select Gender --</option>
                        <option value="Male" <?php echo $data['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo $data['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo $data['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" value="<?php echo htmlspecialchars($data['address']); ?>" required></td>
            </tr>
            <tr>
                <td>Position:</td>
                <td><input type="text" name="position" value="<?php echo htmlspecialchars($data['position']); ?>" required></td>
            </tr>
            <tr>
                <td>Salary:</td>
                <td><input type="number" step="0.01" min="0" name="salary" value="<?php echo htmlspecialchars($data['salary']); ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="btn" type="submit" value="Save">
                    <a href="index.php?action=index">Cancel</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>