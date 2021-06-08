<?php
//session_start();
require_once('db_connect.php');
echo '<div class="container-fluid belka text-center"><h2>Logowanie</h2></div><br />';
echo '<div class="container text-left">';
if (isset($_SESSION['e_mail'])) {
					echo 'Jesteś zalogowany jako:&nbsp;<b>'.$_SESSION['imie'].' '.$_SESSION['nazwisko'].'&nbsp; </b>';
          echo '<a href="wyloguj.php" class="btn btn-danger " role="button" aria-pressed="true">Wyloguj</a>';
							} else {

#formularza logowania
if (isset($_POST['zaloguj'])) {
	
#wczytuje plik obsługujący połaczenie z baza danych
	require_once('db_connect.php');

#tworze pustą informację
$informacja = NULL;


#sprawdzamy czy wprowadzono login
if (empty($_POST['login'])) {
	$login=FALSE;
	$informacja .= 'Zapomniałeś podać nazwy użytkownika<br /> ';
} else {
	$login=$_POST['login'];
}

#sprawdzamy czy wprowadzono hasło
if (empty($_POST['haslo'])) {
	$haslo=FALSE;
	$informacja .= 'Nie wprowadziłeś hasła <br />';
} else {
	$adin="bju";
	$pre="tex";
	$haslo=sha1($adin.$_POST['haslo'].$pre);
}

if ($login && $haslo) {
	

	$zapytanie="SELECT id_uzytkownika, imie, nazwisko, login, haslo, email, nazwa_typu FROM uzytkownik INNER JOIN typ_uzytkownika ON uzytkownik.id_typu=typ_uzytkownika.id_typu WHERE login='$login' AND haslo='$haslo'";
	
	#wykonuje zapytanie
	$wynik=mysqli_query($naw_pol,$zapytanie);
	
	#oczekuje zwrotu rekordu
	$wiersz=mysqli_fetch_array($wynik);
		
		if ($wiersz) {
		
			session_start();
			$_SESSION['nazwisko']=$wiersz['2'];
			$_SESSION['imie']= $wiersz['1'];
			$_SESSION['e_mail']=$wiersz['5'];
			$_SESSION['status']= $wiersz['6'];
			$_SESSION['kto']=$wiersz['0'];
			
		header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
			exit;
			
		} else {
			$informacja='Dane, które wprowadziłeś nie zgadzaja się';
		}
	
	#zamykam połączenie z bazą danych
	mysqli_close($naw_pol);
} else {
	$informacja.='<a href="index.php?url=glowna">Spróbuj jeszcze raz</a>';
}

if (isset($informacja)) {
	echo $informacja;
}


} else {
?>
	<form action="" method="POST">
	<div class="row mb-3">
  <label for="inputLogin" class="col-sm-2 col-form-label">Login: </label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputLogin" name="login" />
  </div>
</div>
<div class="row mb-3">
  <label for="inputPassword" class="col-sm-2 col-form-label">Hasło: </label>
  <div class="col-sm-10">
    <input type="password" class="form-control" id="inputPassword" name="haslo" />
  </div>
</div>

    <button type="submit" name="zaloguj" class="btn rozowyguzik w-100">Zaloguj</button>
    <p class="pt-2 text-center">Nie masz jeszcze konta? Zarejestruj się <a href="index.php?url=rejestracja">tutaj</a>!</p>
  
</form>

<?php

	}
	}
?>
</div>
