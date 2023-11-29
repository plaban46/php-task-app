<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
require 'TaskInterface.php';
require './Database.php';

class TaskRepository implements TaskInterface
{

    private $db;

    public function __construct()
    {
        $this->db = new Database(
            $_ENV['DB_HOST'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE']
        );
    }

    public function getTask()
    {
        $sql = "SELECT tasks.id,
                tasks.title,
                tasks.description,
                tasks.status,
                tasks.created_at,
                COALESCE(users.name, 'N/A') as user_name
                FROM tasks
                LEFT JOIN users
                ON tasks.user_assign_id = users.id";

        return $this->db->fetchAll($sql);
    }

    public function storeTask()
    {
        //store the task
    }

    public function updateTask($id, $title, $description)
    {
        $sql = "UPDATE tasks SET 
            title = '$title', 
            description = '$description' 
            WHERE id = $id";

        $result = $this->db->query($sql);

        return $result;
    }

    public function deleteTask($id)
    {
        $sql = "DELETE FROM tasks WHERE id = $id";
        $result = $this->db->query($sql);
        
        return $result;
    }
}
