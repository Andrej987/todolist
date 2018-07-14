<?php  if (isset($_GET['user_id']) && isset($_GET['todolist_id'])) {

  $user_id = $_GET['user_id'];
  $todolist_id = $_GET['todolist_id'];

} ?>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center><h3 class = "text-success modal-title">Add Task</h3></center>
		</div>
		<form class="form-inline">
      <div class="form-group">
          <input type="text" placeholder="Taskname" id="taskname" name="taskname" value="" class="form-control">
        </div>
        <div class="modal-body">
          <select name="priority">
            <option type="text" id="priority" value="High">High</option>
            <option type="text" id="priority" value="Normal">Normal</option>
            <option type="text" id="priority" value="Low">Low</option>
          </select>
        </div>
        <div class="form-group">
          <input type="hidden" placeholder="" id="user_id" name="user_id" value="<?php echo $user_id; ?>" class="form-control">
        </div>

        <div class="form-group">
          <input type="hidden" placeholder="" id="todolist_id" name="todolist_id" value="<?php echo $todolist_id ?>" class="form-control">
        </div>

        <div class="form-group">
          <input type="date" placeholder="Deadline" id="deadline" name="deadline" value="" class="form-control">
        </div>

		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> |

        <button type="submit" class="btn btn-danger addTask" name="addTask" id="addTask" value="">Add</button>
		</div>
		</form>
    </div>
  </div>
</div>
