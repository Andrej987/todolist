<?php

if (isset($_POST['updateTask'])) {

  $task_id = $_POST['task_id'];
  $taskname = $_POST['taskname'];
  $priority = $_POST['priority'];
  $deadline = $_POST['deadline'];
  $status = $_POST['status'];

$query = "UPDATE tasks SET taskname = '{$taskname}', priority = '{$priority}', deadline = '{$deadline}', status = '{$status}' WHERE id = $task_id  ";

mysqli_query($connection, $query);

}

?>
