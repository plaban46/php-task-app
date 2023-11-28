<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/repositories/TaskRepository.php';


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
}


