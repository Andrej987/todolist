<?php

if (isset($_GET['user_id']) && isset($_GET['todolist_id'])) {

  $user_id = $_GET['user_id'];
  $todolist_id = $_GET['todolist_id'];


  $query = "SELECT * FROM tasks WHERE user_id = $user_id AND todolist_id = $todolist_id ";
  $select_tasks_query = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_tasks_query)){

    $task_id = $row['id'];
    $taskname = $row['taskname'];
    $priority = $row['priority'];
    $unformated_deadline = $row['deadline'];
    $status = $row['status'];

    $deadline = date("m-d-Y");
    $today = date('Y-m-d');

    $days_till_deadline = abs(strtotime($unformated_deadline) - strtotime($today));

    $years = floor($days_till_deadline / (365*60*60*24));
    $months = floor(($days_till_deadline - $years * 365*60*60*24) / (30*60*60*24));
    $days_till_deadline = floor(($days_till_deadline - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

?>



<div class="modal fade" id="editModal<?php echo $task_id;  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center><h3 class = "text-success modal-title">Update Task</h3></center>
		</div>
		<form class="form-inline">
        <div class="modal-body">
          <input type="text" placeholder="<?php echo $taskname; ?>" id="taskname" name="taskname" value="" class="form-control">
        </div>
        <div class="modal-body">
          <select name="priority">
            <option type="text" id="priority" value="High">High</option>
            <option type="text" id="priority" value="Normal">Normal</option>
            <option type="text" id="priority" value="Low">Low</option>
          </select>
        </div>
        <div class="modal-body">
          <input type="date" placeholder="<?php echo $unformated_deadline; ?>" id="deadline" name="deadline" value="" class="form-control">
        </div>
        <div class="modal-body">
          <select name="status">
            <option type="text" id="status" value="Unfinished">Unfinished</option>
            <option type="text" id="status" value="Finished">Finished</option>
          </select>
        </div>

		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> |
        <button type="submit" class="btn btn-danger " name="updateTask" id="updateTask" value="">Update Task</button>
		</div>
		</form>
    </div>
  </div>
</div>

<?php

  }

}

?>
