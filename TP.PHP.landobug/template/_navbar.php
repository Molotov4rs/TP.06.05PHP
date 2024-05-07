<div class="d-flex flex-column w-100">
  <a href="../index.php">
    <img class="m-2 logo" src="../img/images/logo.png" alt="Logo du site">
  </a>

  <nav class="navbar navbar-expand-lg custom_background w-100">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../toys.php">Tous les jeux</a>
          </li>
          <li class="nav-item dropdown2">
            <a class="nav-link dropdown-toggle2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Par console</a>
            <ul class="dropdown-menu">
              <?php get_stores() ?>
              TODO: REFAIR fonction get_stores pour avoir les indos des consoles
            </ul>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>