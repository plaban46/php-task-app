<?php

require 'TaskController.php';

$taskRepository = new TaskRepository;
$task = new TaskController($taskRepository);
//print_r($task->users());
$users = $task->users();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $task->update($_POST['id'], strip_tags($_POST['title']), $_POST['description']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $task->delete($_POST['task-id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $task->store(strip_tags($_POST['title']), $_POST['description']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status'])) {
    $task->changeStatus($_POST['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['assign'])) {
    $task->assignTaskTo($_POST['user-id'], $_POST['task-id']);
}

?>
<!---include navbar --->
<?php include 'views/navbar.php';?>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>All Tasks</h1>
                    <h4>Total tasks: <?php echo count($task->index()); ?> </h4>
                </div>
                <div>
                    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Task</button>
                </div>
            </div>
            <?php include 'views/add.php';?>
            <!--Display flash message-->
            <?php include 'flash_message.php';?>

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
                                        class="badge <?php echo $task['status'] == 0 ? 'text-bg-dark' : 'text-bg-info'; ?> text-white"><?php echo $task['status'] == 0 ? 'Open' : 'Closed'; ?></span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop<?php echo $task['id']; ?>">Edit</button>
                                        <button class="btn btn-dark ms-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $task['id']; ?>">Delete</button>&nbsp;&nbsp;
                                        <form method="POST" action="">
                                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>" />
                                            <button type="submit" name="status"
                                                class="<?php echo $task['status'] == 0 ? 'btn btn-dark' : 'btn btn-info text-white' ?>">
                                                <?php echo $task['status'] == 0 ? 'Close' : 'Open'; ?>
                                            </button>
                                        </form>&nbsp;&nbsp;
                                        <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                            data-bs-target="#showTask<?php echo $task['id']; ?>">View</button>&nbsp;&nbsp;
                                            <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                            data-bs-target="#assignModal<?php echo $task['id']; ?>">Assign</button>
                                    </div>
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
                                                    <textarea class="form-control" name="description" id="summernote2"
                                                        required><?php echo $task['description']; ?></textarea>
                                                </div>
                                                <div><input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="update" class="btn btn-dark">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--include show modal -->
                            <?php include 'views/show.php';?>
                            <?php include 'views/assign.php';?>
                            <!--include delete confirmation-->
                            <?php include 'views/modal.php';?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    </script>
        <script>
    $(document).ready(function() {
        $('#summernote2').summernote();
    });
    </script>
</body>

</html>