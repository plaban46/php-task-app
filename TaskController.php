<?php

require __DIR__ . '/repositories/TaskRepository.php';
session_start();

class TaskController extends TaskRepository
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->getTask();
    }

    public function update($id, $title, $description)
    {
        if (!empty($id) && !empty($title) && !empty($description)) {

            $updateTask = $this->repository->updateTask($id, $title, $description);
            if ($updateTask) {
                $_SESSION['success_message'] = 'Task updated successfully';

            } else {
                $_SESSION['error_message'] = 'Task unable to update';
            }
        }
    }

    public function store($title, $description)
    {
        if (empty($title) || empty($description)) {
            $_SESSION['error_message'] = 'All fields are required';
            return false;
        }

        $storeTask = $this->repository->storeTask($title, $description);
        if ($storeTask) {
            $_SESSION['success_message'] = 'Task stored successfully';

        } else {
            $_SESSION['error_message'] = 'Unable to store task';
        }

    }

    public function delete($id)
    {
        if ($id) {
            $deleteTask = $this->repository->deleteTask($id);
            if ($deleteTask) {
                $_SESSION['success_message'] = 'Task deleted successfully';

            } else {
                $_SESSION['error_message'] = 'Task unable to delete';
            }
        }
    }

    public function changeStatus($id)
    {
        if ($id) {
            $updateTaskStatus = $this->repository->taskStatus($id);
            if ($updateTaskStatus) {
                $_SESSION['success_message'] = 'Task status changed successfully';

            } else {
                $_SESSION['error_message'] = 'Unable to change task status';
            }
        }
    }

    public function users()
    {
       return $this->repository->getAllUsers();
    }

    public function assignTaskTo($userId, $taskId)
    {
        $assignSuccess = $this->repository->assign($userId, $taskId); 
        if ($assignSuccess) {
            $_SESSION['success_message'] = 'Task assigned successfully';

        } else {
            $_SESSION['error_message'] = 'Unable to assign task to user';
        }
    }
}
