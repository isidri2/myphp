<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 1000px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        .btn { padding: 4px 10px; text-decoration: none; border-radius: 3px; font-size: 14px; }
        .btn-edit { background-color: #2d7ff9; color: white; }
        .btn-delete { background-color: #e74c3c; color: white; }
        .btn-add { background-color: #27ae60; color: white; padding: 8px 14px; }
        .success-msg { color: green; font-weight: bold; }
        .actions a { margin-right: 6px; }
    </style>
</head>
<body>

    <h1>Faculty List</h1>

    <?php if (isset($_GET['status'])): ?>
        <?php
            $messages = [
                'created' => 'Faculty member added successfully!',
                'updated' => 'Faculty member updated successfully!',
                'deleted' => 'Faculty member deleted successfully!',
            ];
        ?>
        <?php if (isset($messages[$_GET['status']])): ?>
            <p class="success-msg"><?php echo htmlspecialchars($messages[$_GET['status']]); ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <p><a class="btn btn-add" href="index.php?action=create">+ Add New Faculty</a></p>

    <?php if (empty($facultyList)): ?>

        <p>No faculty records found.</p>

    <?php else: ?>

        <table>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>

            <?php foreach ($facultyList as $f): ?>
                <tr>
                    <td><?php echo htmlspecialchars($f['faculty_fname']); ?></td>
                    <td><?php echo htmlspecialchars($f['faculty_mname']); ?></td>
                    <td><?php echo htmlspecialchars($f['faculty_lname']); ?></td>
                    <td><?php echo htmlspecialchars($f['faculty_age']); ?></td>
                    <td><?php echo htmlspecialchars($f['faculty_gender']); ?></td>
                    <td><?php echo htmlspecialchars($f['faculty_address']); ?></td>
                    <td><?php echo htmlspecialchars($f['faculty_position']); ?></td>
                    <td><?php echo number_format((float)$f['faculty_salary'], 2); ?></td>
                    <td class="actions">
                        <a class="btn btn-edit" href="index.php?action=edit&id=<?php echo (int)$f['faculty_id']; ?>">Edit</a>
                        <a class="btn btn-delete" href="index.php?action=delete&id=<?php echo (int)$f['faculty_id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php endif; ?>

</body>
</html>