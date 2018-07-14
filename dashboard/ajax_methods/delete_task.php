<?php include "../../includes/database.php" ?>
<?php

if (isset($_POST['delete'])) {

  $task_id = $_POST['task_id'];

  $query = "DELETE FROM tasks WHERE id = $task_id ";

  $delete_task_query = mysqli_query($connection, $query);

}

?>
