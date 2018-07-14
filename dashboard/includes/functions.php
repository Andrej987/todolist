<?php

function select_todolist(){

  global $connection;
  $query = "SELECT * FROM todolist ";
  $select_todolist = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_todolist)){

    $user_id = $_SESSION['id'];
    $todolist_id = $row['id'];
    $listname = $row['listname'];
    $unformated_created_at = $row['created_at'];

    $created_at = date("d-m-Y", strtotime($unformated_created_at));

    echo "<tr>";
    echo "<td>{$listname}</td>";
    echo "<td>{$created_at}</td>";

    $query = "SELECT * FROM tasks WHERE todolist_id = {$todolist_id} ";
    $select_tasks = mysqli_query($connection, $query);

    $tasks_count = mysqli_num_rows($select_tasks);

    echo "<td>{$tasks_count}</td>";

    $query = "SELECT * FROM tasks WHERE todolist_id = {$todolist_id} AND status = 'Unfinished' ";
    $select_unfinished_tasks = mysqli_query($connection, $query);
    $unfinished_tasks_count = mysqli_num_rows($select_unfinished_tasks);

    echo "<td>{$unfinished_tasks_count}</td>";

    $query = "SELECT * FROM tasks WHERE todolist_id = {$todolist_id} AND status = 'Finished' ";
    $select_unfinished_tasks = mysqli_query($connection, $query);
    $finished_tasks_count = mysqli_num_rows($select_unfinished_tasks);

    if ($tasks_count == 0) {
      echo "<td>Nema Taskova</td>";
    }else{
      $success_rate = ($finished_tasks_count/$tasks_count)  * 100;
      echo "<td>{$success_rate} %</td>";
    }
    echo "<td><a href='tasks.php?source=view_all_tasks&user_id={$user_id}&todolist_id={$todolist_id}'>View Tasks</a></td>";
    echo "<td><a href='index.php?delete={$todolist_id}&user_id={$user_id}'>Delete</a></td>";
    echo "</tr>";

  }

}

function delete_todolist(){

  global $connection;

  if (isset($_GET['delete'])) {

    $user_id = $_SESSION['id'];
    $todolist_id = $_GET['delete'];
    $query =  "DELETE FROM todolist, tasks USING todolist JOIN tasks WHERE todolist.id = $todolist_id AND tasks.todolist_id = $todolist_id ";

    $delete_query = mysqli_query($connection, $query);

    header("Location: index.php?user_id=$user_id ");
  }

}


function update_task(){

  global $connection;
  if (isset($_POST['update_task'])) {

    $task_id = $_GET['task_id'];
    $user_id = $_GET['user_id'];
    $todolist_id = $_GET['todolist_id'];

    $update_taskname = $_POST['taskname'];
    $update_priority = $_POST['priority'];
    $update_deadline = $_POST['deadline'];
    $update_status = $_POST['status'];


    $query = "UPDATE tasks SET taskname = '{$update_taskname}', priority = '{$update_priority}', deadline = '{$update_deadline}', status = '{$update_status}' WHERE id = $task_id  ";
    $update_query = mysqli_query($connection, $query);

    if (!$update_query) {
      die('QUERY FAILED' . mysqli_error($connection));
    }

    header("Location: tasks.php?source=view_tasks&user_id={$user_id}&todolist_id={$todolist_id}");

  }

}

function set_task_as_finished(){

global $connection;

if (isset($_GET['finished'])) {

  $user_id = $_GET['user_id'];
  $todolist_id = $_GET['todolist_id'];
  $task_id = $_GET['finished'];
  $query = "UPDATE tasks SET status = 'Finished' WHERE id= '$task_id' ";

  $finished_task_query = mysqli_query($connection, $query);

  header("Location: tasks.php?source=view_tasks&user_id=$user_id&todolist_id=$todolist_id");

}

}

?>
