<?php

    class Database {
        private $host = 'localhost';
        private $dbName = 'Copains';
        private $username = 'root';
        private $password = 'khalid0000';
        private $pdo;
        private $error;
        private $stmt;

        public function __construct() {

            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare statement with query
        public function query($sql) {
            $this->stmt = $this->pdo->prepare($sql);
        }

        // Bind values
        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        // Execute the prepared statement
        public function execute() {
            return $this->stmt->execute();
        }

        // Get result set as array of objects
        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Get a single record as an object
        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        // Get row count
        public function rowCount() {
            return $this->stmt->rowCount();
        }
    }


/*
    // Usage example
    $db = new Database();

    // SELECT example
    $db->query('SELECT * FROM users WHERE id = :id');
    $db->bind(':id', 1);
    $result = $db->single();
    print_r($result);

    // INSERT example
    $db->query('INSERT INTO users (name, email) VALUES (:name, :email)');
    $db->bind(':name', 'John Doe');
    $db->bind(':email', 'john.doe@example.com');
    $db->execute();

    // UPDATE example
    $db->query('UPDATE users SET email = :email WHERE id = :id');
    $db->bind(':email', 'john.new@example.com');
    $db->bind(':id', 1);
    $db->execute();

    // DELETE example
    $db->query('DELETE FROM users WHERE id = :id');
    $db->bind(':id', 1);
    $db->execute();

*/