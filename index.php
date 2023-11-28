<?php

require 'TaskController.php';

$taskRepository = new TaskRepository;
$task = new TaskController($taskRepository);

//print_r($task->index());
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>All Tasks</h1>
            <h4>Total tasks: <?php echo count($task->index()); ?> </h4>
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Assigned To</th>
                                <th scope="col">Title</th>
                                <th scope="col">Created On</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($task->index() as $task) { ?>
                            <tr>
                                <td><?php echo $task['user_name']; ?></td>
                                <td><?php echo $task['title']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($task['created_at'])); ?></td>
                                <td><span
                                        class="badge text-bg-info text-white"><?php echo $task['status'] == 0 ? 'Open' : 'Closed'; ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                    <button class="btn btn-dark">
                                        <?php echo $task['status'] == 0 ? 'Close' : 'Open' ;?>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>