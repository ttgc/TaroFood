<?php
require_once 'database.php'; ?>
<header>
  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="admin.php">
      <!--<img src="/docs/4.2/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">-->
      Administration, Bienvenue <?php echo $_SESSION['user']->login; ?>
    </a>
    <a href="../admin/logout.php" type="button" class="btn btn-dark"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
  </nav>
</header>
<br/>
