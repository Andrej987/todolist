<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

        <a class="navbar-brand" href="index.html">Dashboard</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
      <li><a href="index.php?user_id=<?php echo $_SESSION['id'] ?>">All Lists</a> </li>
      <li><a href="../index.php">Home</a> </li>

        <li><a href="./logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
    </ul>
</nav>
