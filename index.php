<?php
include "includes/database.php";
include "includes/header.php";

?>

<!-- Navigation -->

<?php

include "includes/navigation.php";

?>
<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-md-8">

      <div class="well">
        <h4>Register</h4>



      <?php register(); ?>

        <form class="" action="" method="POST">
          <div class="form-group">
            <input name="email" type="email" class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <input name="firstname" type="text" class="form-control" placeholder="Enter Firstname">
          </div>
          <div class="form-group">
            <input name="lastname" type="text" class="form-control" placeholder="Enter Lastname">
          </div>
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit" name="register">Register</button>
            </span>
          </div>
        </form>
        <!-- /.input-group -->
      </div>

    </div>

    <!-- Blog Sidebar Widgets Column -->

    <?php

    include "includes/sidebar.php";

    ?>
  </div>
  <!-- /.row -->

  <hr>

  <?php

  include "includes/footer.php";

  ?>
