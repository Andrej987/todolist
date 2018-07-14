<?php include "includes/header.php" ?>
<div id="wrapper">

  <?php include "includes/navigation.php" ?>

  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome
            <huge><?php echo $_SESSION['email']; ?></huge>
          </h1>
        </div>
      </div>

      <?php
       if ($_GET['user_id'] != $_SESSION['id']) {

        echo "Toj stranici nemate dozvoljen pristup.";

      } else {

        ?>

        <table class="table table-bordered table-hoover">
          <thead>
            <tr>
              <th>List Name</th>
              <th>Created</th>
              <th>Number of Tasks</th>
              <th>Unfinished Tasks</th>
              <th>Success Rate</th>
              <th>View Tasks</th>
              <th>Delete List</th>
              <th><button><a href="todo_lists.php?source=add_todolist">Add List</a></button></th>
            </tr>

          </thead>
          <tbody>

            <?php select_todolist();   ?>

          </tbody>
        </table>

        <?php delete_todolist();   ?>

      </div>
    </div>

    <?php
  }
  ?>

  <?php include "includes/footer.php" ?>
