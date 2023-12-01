<?php

require_once __DIR__ . '/../vendor/autoload.php';
require 'TaskInterface.php';
require './Database.php';

$dotenv = Dotenv\Dotenv::createImmutable( dirname( __DIR__ ) );
$dotenv->load();

class TaskRepository implements TaskInterface {

    private $db;

    public function __construct() {
        $this->db = new Database(
            $_ENV[ 'DB_HOST' ],
            $_ENV[ 'DB_USERNAME' ],
            $_ENV[ 'DB_PASSWORD' ],
            $_ENV[ 'DB_DATABASE' ]
        );
    }

    public function getTask() {
        $sql = "SELECT tasks.id,
                tasks.title,
                tasks.description,
                tasks.status,
                tasks.created_at,
                COALESCE(users.name, 'N/A') as user_name
                FROM tasks
                LEFT JOIN users
                ON tasks.user_assign_id = users.id";

        return $this->db->fetchAll( $sql );
    }

    public function storeTask($title, $description, $status = 0) {
        $sql = "INSERT INTO tasks (title, description, status, created_at) VALUES (?, ?, ?, NOW())";
        $result = $this->db->prepareAndExecute($sql, 'ssi', $title, $description, $status);

        return $result;
    }

    public function updateTask($id, $title, $description) {
        $sql = "UPDATE tasks SET title = ?, description = ? WHERE id = ?";
        $result = $this->db->prepareAndExecute($sql, 'ssi', $title, $description, $id);

        return $result;
    }

    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id = ?";
        $result = $this->db->prepareAndExecute($sql, 'i', $id);

        return $result;
    }

    public function taskStatus( $id ) {
        $sql = "SELECT status FROM tasks WHERE id = ?";
        $result = $this->db->prepareAndExecute($sql, 'i', $id);
        if ( $result ) {
            $row = $result->fetch_assoc();
            if ( $row && $row[ 'status' ] == 0 ) {
                $updateSql = "UPDATE tasks SET status = 1 WHERE id = $id";
                $updateResult = $this->db->query( $updateSql );

                return $updateResult;
            } else {
                $updateSql = "UPDATE tasks SET status = 0 WHERE id = $id";
                $updateResult = $this->db->query( $updateSql );

                return $updateResult;
            }
        }

    }

    public function getAllUsers()
    {
        $sql = "SELECT id,name,email FROM users";

        $result = $this->db->query( $sql );

        return $result;
    }

    public function assign($userId, $taskId)
    {
        $sql = "UPDATE tasks SET user_assign_id = ? WHERE id = ?";
        $result = $this->db->prepareAndExecute($sql, 'ii', $userId, $taskId);

        return $result;

    }
    
}
