<?php 

class Database
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    private function connect()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);

        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }

        return $result;
    }

    public function prepareAndExecute($sql, $types, ...$params) {
        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();

        return $result;
    }

    public function fetchAll($sql)
    {
        $result = $this->query($sql);
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}
