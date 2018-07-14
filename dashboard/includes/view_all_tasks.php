<table class="table table-bordered table-hoover">

  <?php

  if (isset($_GET['user_id']) && isset($_GET['todolist_id'])) {

    $user_id = $_GET['user_id'];
    $todolist_id = $_GET['todolist_id'];


    if ($user_id != $_SESSION['id']) {
      echo "Toj stranici nemate dozvoljen pristup.";
    }else{


    $query = "SELECT * FROM tasks WHERE user_id = $user_id AND todolist_id = $todolist_id ";


    if (isset($_GET['task_desc']))
    {
      $query .= " ORDER BY taskname DESC ";
    }
    elseif (isset($_GET['deadline_desc']))
    {
      $query .= " ORDER BY deadline ";
    }
     elseif (isset($_GET['finish']))
   {
    $query .= " AND status= 'Finished '";
    }
     elseif (isset($_GET['unfinished']))
    {
      $query .= " AND status= 'Unfnished '";
    }
    elseif(isset($_GET['priority']))
    {
      $query .= " ORDER BY FIELD (priority, 'high', 'normal', 'low') ";
    }

    ?>

    <thead>

      <tr>

        <th>Task Title</th>
        <th>Priority</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Deadline Status</th>
        <th><div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort</button>
            <ul class="dropdown-menu">
              <li><a href="tasks.php?source=view_tasks&user_id=<?php echo $user_id ?>&todolist_id=<?php echo $todolist_id ?>">Sort by Id</a></li>
              <li><a href="tasks.php?source=view_tasks&user_id=<?php echo $user_id ?>&todolist_id=<?php echo $todolist_id ?>&task_desc">Sort by Taskname</a></li>
              <li><a href="tasks.php?source=view_tasks&user_id=<?php echo $user_id ?>&todolist_id=<?php echo $todolist_id ?>&deadline_desc">Sort by Deadline</a></li>
              <li><a href="tasks.php?source=view_tasks&user_id=<?php echo $user_id ?>&todolist_id=<?php echo $todolist_id ?>&finish">Sort by Finished Tasks</a></li>
              <li><a href="tasks.php?source=view_tasks&user_id=<?php echo $user_id ?>&todolist_id=<?php echo $todolist_id ?>&unfinished">Sort by Unfinished Tasks</a></li>
              <li><a href="tasks.php?source=view_tasks&user_id=<?php echo $user_id ?>&todolist_id=<?php echo $todolist_id ?>&priority">Sort by Priority</a></li>
            </ul>
          </div></th>
          <td><button><a href='tasks.php?source=add_task&user_id=<?php echo $user_id ?>&todolist_id= <?php echo $todolist_id ?>'>Add Tasks</a></button></td>
          <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Task</button></th>

          <?php include "modals/add_modal.php" ?>

        </tr>

      </thead>

      <tbody>

        <?php

        $select_tasks_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_tasks_query)){

          $task_id = $row['id'];
          $taskname = $row['taskname'];
          $priority = $row['priority'];
          $unformated_deadline = $row['deadline'];
          $status = $row['status'];

          $deadline = date("d-m-Y", strtotime($unformated_deadline));

          $today = date("d-m-Y");

          $difference = abs($deadline) - abs($today);

          echo "<tr>";
          echo "<td>{$taskname}</td>";
          echo "<td>{$priority}</td>";
          echo "<td>{$deadline}</td>";
          echo "<td>{$status}</td>";

          if ($difference > 0) {

            echo "<td>Rok istiće za {$difference} dana.</td>";

          }elseif ($difference < 0) {
            $positive = abs($difference);
            echo "<td><strong>Rok je ISTEKAO prije {$positive} dana. </strong></td>";

          } else {

            echo "<td>Rok je istekao!</td>";

          }

          echo "<td><a href='tasks.php?source=edit_task&user_id=$user_id&todolist_id=$todolist_id&task_id={$task_id}'>Edit Task</a></td>";
          echo "<td><button><a href='tasks.php?source=view_tasks&user_id=$user_id&todolist_id=$todolist_id&finished=$task_id'>Finished</a></button></td>";

          ?>

          <?php set_task_as_finished();  ?>

          <?php echo "<td>" ?>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $task_id?>">Edit</button>

            <?php echo "</td>" ?>

            <?php echo "<td>" ?>

              <button type="submit" class="btn btn-danger " name="delete" id="delete" value="<?php echo $task_id ?>"><span class = "glyphicon glyphicon-trash"></span>Delete</button>

              <?php echo "</td>" ?>

              <?php

            }

            include "modals/edit_modal.php";

          }

        }

          echo "</tr>";

          ?>


        </tbody>

      </table>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

      <script type="text/javascript">
      $(document).on('click', '#delete', function(){
        $task_id=$(this).val();
        $.ajax({
          type: "POST",
          url: "ajax_methods/delete_task.php",
          data: {
            task_id: $task_id,
            delete: 1,
          },
          success: function(data){
            window.location.reload();
            console.log(data);
          }
        });
      });

      $(document).ready(function (event) {

        $('#addTask').click(function (event) {
          var taskname = $('#taskname').val();
          var priority = $('#priority').val();
          var user_id = $('#user_id').val();
          var todolist_id = $('#todolist_id').val();
          var deadline = $('#deadline').val();

          $.ajax({
            type: "POST",
            url: "ajax_methods/add.php",
            data: {
              taskname: $taskname,
              priority: $priority,
              user_id: $user_id,
              todolist_id: $todolist_id,
              deadline: $deadline,
              addTask: 1,
            },
            success: function(data){
              window.location.reload();
              console.log(data);
            }
          });
        });
      });

      $(document).on('click', '#updateTask', function(){
        var taskname = $('#taskname').val();
        var priority = $('#priority').val();
        var deadline = $('#deadline').val();
        var status = $('#status').val();

        $.ajax({
          type: "POST",
          url: "ajax_methods/update_task.php",
          data: {
            taskname: $taskname,
            priority: $priority,
            deadline: $deadline,
            status: $status,
            updateTask: 1,
          },
          success: function(data){
            window.location.reload();
            console.log(data);
          }
        });
      });

      </script>
