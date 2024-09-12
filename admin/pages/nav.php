<style>
  .offcanvas {
    --bs-offcanvas-width: 75%;
  }
</style>

<!-- NAVBAR MENÜ -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <?php
    if ($_SESSION['user_theme'] == "dark") {
      echo '<a href="/admin" title="Site Logosu"><img class="img-fluid" src="' . optioninfo("option_dark_logo_link") . '"></a>';
    } else {
      echo '<a href="/admin" title="Site Logosu"><img class="img-fluid" src="' . optioninfo("option_light_logo_link") . '"></a>';
    }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MenuLogo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="offcanvas-body d-lg-none">
          <?php
          include("menu.php");
          ?>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- BİLDİRİM BÖLMESİ -->
<div class="d-flex justify-content-center p-2 mb-2">
  <?php
  if (isset($_GET["alert"])) {
    $alert_name = htmlspecialchars(strip_tags($_GET["alert"]));
    echo alert($alert_name);
  }
  ?>
</div>

<!-- SOL SIDEBAR -->

<body class="container mb-5">
  <div class="row mt-3">
    <div class="col-3 d-none d-lg-block">
      <?php
      include("menu.php");
      ?>
    </div>