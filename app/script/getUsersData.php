<?php
class GetUserData {
    private $mysqli;

    public function __construct($host, $username, $password, $database) {
        $this->mysqli = new mysqli($host, $username, $password, $database);

        if ($this->mysqli->connect_errno) {
            echo "Echec de la connexion: " . $this->mysqli->connect_error;
            exit();
        }
    }

    public function getUsers() {
        $sql = "SELECT username, domain_name, pwd FROM users";
        $data = "";
        if ($query = $this->mysqli->query($sql)) {
            echo "Résultats de users: " . $query -> num_rows;
            $result = $query->get_result();
            $data = $result->fetch_assoc();
            $result->free();
            return $data;
        }
        return $data;
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

    public function getDomainsByUserName($username) {
        $sql = "SELECT domain_name FROM users WHERE username = ?";
        if ($querydomain = $this->mysqli->prepare($sql)) {
            $querydomain->bind_param("s", $username);

            if ($querydomain->execute()) {
                $result = $querydomain->get_result();
                $data = $result->fetch_assoc();
                $result->free();
                return $data;
            } else {
                echo "Error executing statement: " . $querydomain->error;
            }
            $querydomain->close();

        } else {
            echo "Error preparing statement: " . $this->mysqli->error;
        }
    }

    public function insertNewUser($username, $password,$ssh,$domain){

        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->mysqli -> connect_error;
            exit();
        }
        $sql = "INSERT INTO users (username, pwd, ssh, domain_name) VALUES ('$username','$password','$ssh','$domain')";

        if ($this->mysqli->query($sql)) {
            echo("Record inserted successfully.<br />");
            header('Location: /');
        }
        if ($this->mysqli->errno) {
            echo("Could not insert <br />".$this->mysqli->error);
        }
        $this->mysqli->close();
    }

}










