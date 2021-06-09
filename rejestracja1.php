<?php
include('db_connect.php');
echo '<div class="container-fluid belka text-center "><h2>Rejestracja </h2></div><br /><div class="container text-left">';
if(isset($_POST['guzik1'])){
  
//trzeci krok rejestracji
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$data_urodzenia=$_POST['data_urodzenia'];
$plec=$_POST['plec'];
$nrtel=$_POST['nrtel'];
$email=$_POST['email']; 
$login=$_POST['login'];

if(!isset($_POST['zgoda2'])){
  $zgoda2="brak";}
   else { 
     $zgoda2=$_POST['zgoda2'];
    }

//wzorce walidacji
 $wzorzec1='/^[a-zA-Zęóąśłżźćń]{3,}$/';
 $wzorzec2='/^[a-zA-Zęóąśłżźćń]{3,}$/';
 $wzorzec3='/^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/';
 $wzorzec4='/^[0-9]{9}$/';
//sprawdzanie poprawnosci
 $sprawdz1=preg_match($wzorzec1,$imie);
 $sprawdz2=preg_match($wzorzec2,$nazwisko);
 $sprawdz3=preg_match($wzorzec3,$email);
 $sprawdz4=preg_match($wzorzec4,$nrtel);
//informowanie uzytkownika
if($sprawdz1==false){
echo 'Podałeś nieprawidłowe imię!'; } else {

if($sprawdz2==false){
echo 'Podałeś nieprawidłowe nazwisko!'; } else {

if($sprawdz3==false){
echo 'Podałeś nieprawidłowy e-mail!'; } else {

if($sprawdz4==false){
echo 'Podałeś nieprawidłowy numer telefonu!'; } else {

if(strlen($login)>=16 && strlen($login)<=3){
echo 'Login musi mieć minimum 3 znaki maksimum 16 znaków!'; } else {

if($_POST['haslo']==NULL){
echo 'Nie podałeś hasła!'; } else {
	
if($data_urodzenia<'1900-01-01'){ echo 'Niepoprawna data urodzenia!';} else {
	
if(!isset($_POST['zgoda1'])){	echo 'Musisz zgodzić się z regulaminem.';} else {
  
	$zgoda1=$_POST['zgoda1'];
	$zapytanie3="SELECT login from uzytkownik where login='$login';";
	$wyk_zap3=mysqli_query($naw_pol, $zapytanie3);
	
	if(mysqli_num_rows($wyk_zap3)==0){
	

//szyfrowanie hasla
$adin="bju";
$pre="tex";
$haslo=sha1($adin.$_POST['haslo'].$pre);
$haslo1=sha1($adin.$_POST['haslo1'].$pre);


//sprawdzanie podanych hasel i rejestracja jesli sie zgadzaja
if($haslo==$haslo1){
	

$zapytanie="INSERT INTO uzytkownik (imie, nazwisko, plec, data_urodzenia, nr_telefonu, email, zgoda1, zgoda2, login, haslo, id_typu)
VALUES ('$imie','$nazwisko','$plec','$data_urodzenia','$nrtel','$email','$zgoda1','$zgoda2','$login', '$haslo', '2');";

  // id typu = 2, bo klient!

$wyk_zap=mysqli_query($naw_pol, $zapytanie);
  

  
if($wyk_zap){
echo "Udało się zarejestrować!";
	
}
else{
	echo "Nie udało się zarejestrować!";
}

	} else {echo 'Hasła muszą być identyczne';}
	} else { echo 'Taki login istnieje już w bazie';}
}
}
}
}
}
}

}
}} else {
//drugi krok rejestracji

echo '<h2>Prosimy uzupełnić jeszcze następujące dane: </h2><br /><form action="" METHOD="POST">
  <div class="row mb-3">
    <label for="inputLogin" class="col-sm-2 col-form-label">Login: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputLogin" name="login" required />
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword" class="col-sm-2 col-form-label">Hasło: </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="haslo" required />
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword1" class="col-sm-2 col-form-label">Powtórz hasło: </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword1" name="haslo1" required />
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Zgody: </label>
    <div class="col-sm-10">
    <input type="checkbox" name="zgoda1" class=""  value="tak"/> Akceptuję regulamin serwisu Bjutex<br />
    <input type="checkbox" name="zgoda2" class=""  value="tak"/> Wyrażam zgodę na przetwarzanie moich danych<br />
    </div>
  </div>

<input type="hidden" name="imie" value="'.$_POST['imie'].'" /> 
<input type="hidden" name="nazwisko" value="'.$_POST['nazwisko'].'" /> 
<input type="hidden" name="data_urodzenia" value="'.$_POST['data_urodzenia'].'" /> 
<input type="hidden" name="plec" value="'.$_POST['plec'].'" /> 
<input type="hidden" name="email" value="'.$_POST['email'].'" /> 
<input type="hidden" name="nrtel" value="'.$_POST['nrtel'].'" /> 
<input type="submit" class="btn rozowyguzik w-100" name="guzik1" value="Potwierdź dane" />
</form>';

} 

echo '</div>';
?>