<?php

if (isset($_POST['create_list'])) {

  $listname = $_POST['listname'];

  $query = "INSERT INTO todolist (listname, created_at)";

    $query .= "VALUES('{$listname}', now()) ";

    $create_list_query = mysqli_query($connection, $query);

header("Location: todo_lists.php?source=add_todolist");
  }

  ?>
<form class="" action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="listname">List Name</label>
    <input type="text" class="form-control" name="listname">
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_list" value="Create List">
  </div>

</form>
