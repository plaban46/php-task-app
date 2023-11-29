<?php

require 'TaskController.php';

$taskRepository = new TaskRepository;
$task = new TaskController($taskRepository);
//print_r($task->index());

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $task->update($_POST['id'], strip_tags($_POST['title']), strip_tags($_POST['description']));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $task->delete($_POST['task-id']);
}

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

<!---include navbar --->
<?php include 'views/navbar.php'; ?>

<body>
    <div class="container">
        <div class="row mt-5">
            <h1>All Tasks</h1>
            <h4>Total tasks: <?php echo count($task->index()); ?> </h4>

            <!--Display flash message-->
            <?php include 'flash_message.php'; ?>

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
                            <?php foreach ($task->index() as $task) {?>
                            <tr>
                                <td><?php echo $task['user_name']; ?></td>
                                <td><?php echo $task['title']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($task['created_at'])); ?></td>
                                <td><span
                                        class="badge text-bg-info text-white"><?php echo $task['status'] == 0 ? 'Open' : 'Closed'; ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop<?php echo $task['id']; ?>">Edit</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $task['id']; ?>">Delete</button>
                                    <button class="btn btn-dark">
                                        <?php echo $task['status'] == 0 ? 'Close' : 'Open'; ?>
                                    </button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal modal-dialog modal-lg" id="staticBackdrop<?php echo $task['id']; ?>"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Task</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" name="title" id="title"
                                                        required value="<?php echo $task['title']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Description</label>
                                                    <textarea class="form-control" name="description" id="description"
                                                        required><?php echo $task['description']; ?></textarea>
                                                </div>
                                                <div><input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="update"
                                                    class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--include delete confirmation-->
                            <?php include 'views/modal.php'; ?>

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