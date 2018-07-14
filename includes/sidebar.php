<?php session_start() ?>

<div class="col-md-4">

  <!-- login -->

  <div class="well">
    <h4>Login</h4>

    <?php login(); ?>

    <form class="" action="" method="POST">

      <div class="form-group">
        <input name="email" type="text" class="form-control" placeholder="Enter Email">
      </div>

      <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="Enter Password">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit" name="login">Login</button>
        </span>
      </div>

    </form>

  </div>
</div>

</div>
</div>
