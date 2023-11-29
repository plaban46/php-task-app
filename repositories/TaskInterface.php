<?php

interface TaskInterface
{
    /**
     * Display a listing of tasks.
     */
    public function getTask();

    /**
     * Store a newly created task in the database.
     */
    public function storeTask();

    /**
     * Update the specified task in the database.
     */
    public function updateTask($id, $title, $description);

    /**
     * Remove the specified task from the database.
     */
    //public function removeTask($id);

    /**
     * Mark a task as completed or incomplete.
     */
    // public function taskStatus(Task $taskStatus);

    /**
     * Assign a task to a user.
     */
    //public function assignToUser(Request $request);
}
