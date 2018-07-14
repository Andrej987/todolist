<form class="" action="" method="post">
  <div class="form-group">
    <label for="edit_task">Edit Task</label>

    <?php

    if (isset($_GET['task_id'])) {

      $task_id = $_GET['task_id'];
      $user_id = $_GET['user_id'];

    if ($user_id != $_SESSION['id']) {
            echo "Toj stranici nemate dozvoljen pristup.";

          }else{

    $query = "SELECT * FROM tasks WHERE id = {$task_id} ";
    $select_task = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_task)) {

              $taskname = $row['taskname'];
              $priority = $row['priority'];
              $unformated_deadline = $row['deadline'];
              $status = $row['status'];
              $user_id = $row['user_id'];
              $todolist_id = $row['todolist_id'];

             $deadline = date("m/d/Y", strtotime($unformated_deadline));

      ?>

        <input type="text" placeholder="Taskname" id="taskname" name="taskname" value="<?php echo $taskname; ?>" class="form-control">

        <br>
        <select class="form-control" name="priority">
          <option type="text" id="priority" value="High">High</option>
          <option type="text" id="priority" value="Normal">Normal</option>
          <option type="text" id="priority" value="Low">Low</option>
        </select>
        <br>

      <div class="form-group">
        <label for="dealdine"></label>
        <input type="text" placeholder="" id="deadline" name="deadline" value="<?php echo $unformated_deadline; ?>" class="form-control">
      </div>

      <br>
      <select name="status" class="form-control">
        <option type="text" id="status" value="Unfinished">Unfinished</option>
        <option type="text" id="status" value="Finished">Finished</option>
      </select>


    <?php  } } } ?>

    <?php update_task(); ?>

    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_task" value="Update Task">
    </div>
  </form>
