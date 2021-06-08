<nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
          <div class="navbar-header">
              <a href="index.php" alt="Bjutex" class="text-decoration-none text-dark logo"><img src="images/logo.png" width="30%" height="30%" class="d-inline-block align-top" loading="lazy"></a>
          </div>
          
          <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#mainNavigation" aria-controls="mainNavigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse"id="mainNavigation">
            <ul class="navbar-nav ml-auto">   
               
<?php
if (isset($_SESSION['nazwisko'])) {

 echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=wyloguj">Wyloguj</a></li>';

} else { 
    echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=rejestracja">Zarejestruj się</a></li>
    <li class="nav-item"><a class="nav-link text-dark" href="index.php?url=logowanie">Zaloguj się</a></li>';
    
}
?>
</ul>
</div>
</div>
</nav>