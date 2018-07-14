<?php include "includes/header.php" ?>

<div id="wrapper">

  <?php include "includes/navigation.php" ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <h1>Tasks</h1>

          <?php

          if (isset($_GET['source'])) {
            $source = $_GET['source'];

          } else {

            $source = '';
          }

          switch ($source) {
            case 'add_task':
            include "includes/add_task.php";
            break;

            case 'edit_task':
            include "includes/edit_task.php";
            break;

            default:
            include "includes/view_all_tasks.php";
            break;
          }

          ?>

        </div>
      </div>
    </div>
  </div>

  <?php include "includes/footer.php" ?>
