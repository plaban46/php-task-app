<!-- Modal -->
<div class="modal fade" id="assignModal<?php echo $task['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Assign</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Task name: <?php echo $task['title']; ?></p>
                   <select name="user-id" class="form-control">
                    <option value="">Select a user to assing task</option>    
                    <?php foreach($users as $user) { ?>
                        <option value="<?php echo $user['id'] ?>"> <?php echo $user['name'] ?></option>
                    <?php }?>
                   </select>
                   <input type="hidden" name="task-id" value="<?php echo $task['id']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-dark" name="assign">Assign</button>
                </div>
            </div>
        </form>
    </div>
</div>