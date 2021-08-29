<?php

use MVC\Controllers\TasksController;

if (isset($_POST['submit'])) {
    $object = new TasksController;
    $object->create();
}

?>
<h1>Create task</h1>
<form method='post' action='<?php $_SERVER['PHP_SELF'] ?>'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>