<?php

require_once __DIR__ . '/../config/Database.php';

class Faculty
{
    private $conn;
    private $table = "faculty";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // CREATE
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table}
                (faculty_fname, faculty_mname, faculty_lname, age, gender, address, position, salary)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            return ["success" => false, "error" => $this->conn->error];
        }

        $stmt->bind_param(
            "sssisssd",
            $data['fname'],
            $data['mname'],
            $data['lname'],
            $data['age'],
            $data['gender'],
            $data['address'],
            $data['position'],
            $data['salary']
        );

        $success = $stmt->execute();
        $error   = $stmt->error;
        $stmt->close();

        return ["success" => $success, "error" => $error];
    }

    // READ ALL
    public function getAll()
    {
        $result = $this->conn->query(
            "SELECT * FROM {$this->table} ORDER BY faculty_lname, faculty_fname"
        );

        $rows = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $result->free();
        }

        return $rows;
    }

    // READ ONE
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE faculty_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        return $row;
    }

    // UPDATE
    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET
                    faculty_fname = ?,
                    faculty_mname = ?,
                    faculty_lname = ?,
                    faculty_age = ?,
                    faculty_gender = ?,
                    faculty_address = ?,
                    faculty_position = ?,
                    faculty_salary = ?
                WHERE faculty_id = ?";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            return ["success" => false, "error" => $this->conn->error];
        }

        $stmt->bind_param(
            "sssisssdi",
            $data['fname'],
            $data['mname'],
            $data['lname'],
            $data['age'],
            $data['gender'],
            $data['address'],
            $data['position'],
            $data['salary'],
            $id
        );

        $success = $stmt->execute();
        $error   = $stmt->error;
        $stmt->close();

        return ["success" => $success, "error" => $error];
    }

    // DELETE
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE faculty_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }
}