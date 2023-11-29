<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Add Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="" method="POST">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" >
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" cols="10" rows="5" name="description" id="description"
                            ></textarea>
                    </div>
                </div>
                <div class="modal-footer mt-2">
                    <button type="submit" name="add" class="btn btn-dark">Add Task</button>
                </div>
            </div>
        </form>
    </div>
</div>
