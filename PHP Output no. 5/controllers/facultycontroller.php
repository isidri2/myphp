<?php

require_once __DIR__ . '/../models/Faculty.php';

class FacultyController
{
    private $facultyModel;

    public function __construct()
    {
        $this->facultyModel = new Faculty();
    }

    // Validate submitted form data. Returns an array of error messages (empty = valid).
    private function validate($data)
    {
        $errors = [];

        if (trim($data['fname'] ?? '') === '') {
            $errors[] = "First name is required.";
        }

        if (trim($data['lname'] ?? '') === '') {
            $errors[] = "Last name is required.";
        }

        if (!isset($data['age']) || !is_numeric($data['age']) || $data['age'] < 18 || $data['age'] > 100) {
            $errors[] = "Age must be a number between 18 and 100.";
        }

        if (!in_array($data['gender'] ?? '', ['Male', 'Female', 'Other'])) {
            $errors[] = "Please select a valid gender.";
        }

        if (trim($data['address'] ?? '') === '') {
            $errors[] = "Address is required.";
        }

        if (trim($data['position'] ?? '') === '') {
            $errors[] = "Position is required.";
        }

        if (!isset($data['salary']) || !is_numeric($data['salary']) || $data['salary'] < 0) {
            $errors[] = "Salary must be a valid positive number.";
        }

        return $errors;
    }

    private function collectInput()
    {
        return [
            'fname'    => trim($_POST['fname'] ?? ''),
            'mname'    => trim($_POST['mname'] ?? ''),
            'lname'    => trim($_POST['lname'] ?? ''),
            'age'      => trim($_POST['age'] ?? ''),
            'gender'   => trim($_POST['gender'] ?? ''),
            'address'  => trim($_POST['address'] ?? ''),
            'position' => trim($_POST['position'] ?? ''),
            'salary'   => trim($_POST['salary'] ?? ''),
        ];
    }

    // LIST all faculty
    public function index()
    {
        $facultyList = $this->facultyModel->getAll();
        require __DIR__ . '/../views/faculty/index.php';
    }

    // CREATE new faculty (show form + handle submission)
    public function create()
    {
        $errors = [];
        $data = [
            'fname' => '', 'mname' => '', 'lname' => '', 'age' => '',
            'gender' => '', 'address' => '', 'position' => '', 'salary' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->collectInput();
            $errors = $this->validate($data);

            if (empty($errors)) {
                $result = $this->facultyModel->create($data);

                if ($result['success']) {
                    header("Location: index.php?action=index&status=created");
                    exit;
                } else {
                    $errors[] = "Database error: " . $result['error'];
                }
            }
        }

        require __DIR__ . '/../views/faculty/create.php';
    }

    // EDIT existing faculty (show form + handle submission)
    public function edit()
    {
        $id = (int)($_GET['id'] ?? 0);
        $errors = [];

        $record = $this->facultyModel->getById($id);

        if (!$record) {
            die("Faculty record not found.");
        }

        $data = [
            'fname'    => $record['faculty_fname'],
            'mname'    => $record['faculty_mname'],
            'lname'    => $record['faculty_lname'],
            'age'      => $record['faculty_age'],
            'gender'   => $record['faculty_gender'],
            'address'  => $record['faculty_address'],
            'position' => $record['faculty_position'],
            'salary'   => $record['faculty_salary'],
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->collectInput();
            $errors = $this->validate($data);

            if (empty($errors)) {
                $result = $this->facultyModel->update($id, $data);

                if ($result['success']) {
                    header("Location: index.php?action=index&status=updated");
                    exit;
                } else {
                    $errors[] = "Database error: " . $result['error'];
                }
            }
        }

        require __DIR__ . '/../views/faculty/edit.php';
    }

    // DELETE faculty
    public function delete()
    {
        $id = (int)($_GET['id'] ?? 0);

        if ($id > 0) {
            $this->facultyModel->delete($id);
        }

        header("Location: index.php?action=index&status=deleted");
        exit;
    }
}