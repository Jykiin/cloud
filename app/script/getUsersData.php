<?php
class GetUserData {
    private $mysqli;

    public function __construct($host, $username, $password, $database) {
        $this->mysqli = new mysqli($host, $username, $password, $database);

        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
            exit();
        }
    }

    public function getUsers() {
        $sql = "SELECT * FROM users";

        if ($result = $this->mysqli->query($sql)) {
            echo "Résultats de users: " . $result -> num_rows;
            $result -> free_result();
        }
        return $result;
    }

    public function getByUserName($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        if ($query = $this->mysqli->prepare($sql)) {
            $query->bind_param("s", $username);

            if ($query->execute()) {
                $result = $query->get_result();
                $data = $result->fetch_assoc();
                $result->free();
                return $data;
            } else {
                echo "Error executing statement: " . $query->error;
            }
            $query->close();

        } else {
            echo "Error preparing statement: " . $this->mysqli->error;
        }
    }
}










