<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/repositories/TaskRepository.php';

class TaskController extends TaskRepository 
{
    private $repository;

    public function __construct( TaskRepository $repository )
    {
        $this->repository = $repository;
    }

    public function index()  
    {
        return $this->repository->getTask();
    }

    public function update($id, $title, $description) 
    {
        if(!empty($id) && !empty($title) &&!empty($description)){ 
            $updateTask = $this->repository->updateTask($id, $title, $description);
            if ( $updateTask ) {
                echo "<div class='alert alert-success'>Task updated Successfully</div>";
            } else {
                echo "class='alert alert-success'>Unable to update task</div>";
            }
        }
    }
}
