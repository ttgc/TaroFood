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

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropleft ml-auto">
        <div>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            0,00 € <i class="fas fa-shopping-cart"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
              require_once './classes/custom_produit.php';
              $panier=fonctions::panier_check();
              foreach($panier as $id){
                $cp = new custom_produit($id);
                $prd = new produit($cp->produit);
                ?>
                <a class="dropdown-item" href="#"><?php echo $prd->lib; ?></a>
                <?php
              }
            ?>
            <hr/>
            <a class="dropdown-item" href="#"><i class="fas fa-trash"></i> Vider le panier</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>