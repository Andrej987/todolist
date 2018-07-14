<?php
if (isset($_POST['addTask'])) {

  $taskname = $_POST['taskname'];
  $priority = $_POST['priority'];
  $user_id =  $_POST['user_id'] ;
  $todolist_id =  $_POST['todolist_id'] ;
  $deadline = $_POST['deadline'];

  $query = "INSERT INTO tasks(taskname, priority, user_id, todolist_id, deadline)";

  $query .= "VALUES('{$taskname}', '{$priority}', {$user_id}, {$todolist_id}, '{$deadline}')";
  $create_task_query = mysqli_query($connection, $query);

  header("Location: tasks.php?source=add_task&user_id={$user_id}&todolist_id={$todolist_id}");

  }

 ?>
