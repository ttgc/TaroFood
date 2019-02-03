<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">TaroFood</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropDown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <?php
      $categories = categorie::getAllCat();
      foreach($categories as $category) {
          ?>
          <li role="presentation" class="<?php if(!empty($_GET['id'])){ if($category['id'] == $_GET['id']) {echo "active" ;}} ?> nav-item"><a class="nav-link" href="produit.php?id=<?php echo $category['id']; ?>"><?php echo $category['libelle']; ?></a></li>
        <?php
      }
      ?>
    </ul>

    <div class="navbar-nav ml-auto">
      <a class="nav-link" href="panier.php"><i class="fas fa-shopping-cart"></i> Panier (<span id="panierItemNumber"></span>)</a></span>
    </div>
  </div>
</nav>