<?php

if (isset($_POST['create_task']) && isset( $_GET['user_id']) && isset( $_GET['todolist_id'])) {

  $user_id =  $_GET['user_id'] ;
  $todolist_id =  $_GET['todolist_id'] ;

  $taskname = $_POST['taskname'];
  $priority = $_POST['priority'];
  $deadline = $_POST['deadline'];

  $query = "INSERT INTO tasks(taskname, priority, user_id, todolist_id, deadline)"; // INSERTING DATA TO COLUMS

  $query .= "VALUES('{$taskname}', '{$priority}', {$user_id}, {$todolist_id}, '{$deadline}')"; // VALUES TO STORE IN COLUMNS

  $create_task_query = mysqli_query($connection, $query);

  header("Location: tasks.php?source=add_task&user_id={$user_id}&todolist_id={$todolist_id}");

}

?>

<form class="" action="" method="POST">

  <div class="form-group">
    <label for="taskname">Task Name</label>
    <input type="text" id="" class="form-control" name="taskname">
  </div>

  <div class="form-group">
    <select class="priority" id="" name="priority">
      <option value="High">High</option>
      <option value="Normal">Normal</option>
      <option value="Low">Low</option>
    </select>
  </div>

  <div class="form-group">
    <label for="deadline">Deadline</label>
    <input type="date" id="" class="form-control" name="deadline">
  </div>

  <div class="form-group">
    <input class="btn btn-primary" id="" type="submit" name="create_task" value="Create Task">
  </div>

</form>
