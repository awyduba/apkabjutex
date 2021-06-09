
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
    if($_SESSION['status']=='klient'){
 echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=umow_wizyte">Umów wizytę</a></li>';
 echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=moje_wizyty">Moje wizyty</a></li>';
 echo '<li class="nav-item"><a class="nav-link text-primary" href="index.php?url=wniosek_salon">Jesteś właścicielem salonu?</a></li>';
    }
    else if($_SESSION['status']=='pracownik'){
        echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=moj_salon">Mój salon</a></li>';
        echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=wizyty_w_salonie">Wizyty</a></li>';
           }
          else if($_SESSION['status']=='administrator'){
            echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=lista_uzytkownikow">Lista użytkowników</a></li>';
            echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=lista_salonow">Lista salonów</a></li>';
            echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=lista_wnioskow">Lista wniosków</a></li>';
               }
               else if($_SESSION['status']=='właściciel'){
                echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=pracownicy">Pracownicy</a></li>';
                echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=moje_salony">Moje salony</a></li>';
                echo '<li class="nav-item"><a class="nav-link text-dark" href="index.php?url=moje_wnioski">Moje wnioski</a></li>';
                echo '<li class="nav-item"><a class="nav-link text-primary" href="index.php?url=wniosek_salon">Nowy wniosek o salon</a></li>';

                   }
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