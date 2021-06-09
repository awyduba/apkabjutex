<?php
include('db_connect.php');
echo '<div class="container-fluid belka text-center "><h2>Wniosek o salon </h2></div><br /><div class="container text-left">';
if(isset($_SESSION['status'])=='klient') {
    if(isset($_POST['guzik1'])){
$kto=$_SESSION['kto'];

//trzeci krok wniosku
$nazwa_salonu=$_POST['nazwa_salonu'];
$ulica=$_POST['ulica'];
$miejscowosc=$_POST['miejscowosc'];
$kod_pocztowy=$_POST['kod_pocztowy'];
$data_otwarcia=$_POST['data_otwarcia'];
$nip=$_POST['nip'];
$dodatkowe_informacje=$_POST['dodatkowe_informacje'];
//$zalacznik=$_POST['zalacznik'];
	

$zapytanie3="SELECT nazwa_salonu, id_wlasciciela from wniosek_salon where nazwa_salonu='$nazwa_salonu' and id_wlasciciela='$kto';";
$wyk_zap3=mysqli_query($naw_pol, $zapytanie3);

if(mysqli_num_rows($wyk_zap3)==0){

$zapytanie="INSERT INTO wniosek_salon (nazwa_salonu, ulica, miejscowosc, kod_pocztowy, nip, data_otwarcia, dodatkowe_informacje, zalacznik, akceptacja, id_wlasciciela)
VALUES ('$nazwa_salonu','$ulica','$miejscowosc','$kod_pocztowy','$nip','$data_otwarcia','$dodatkowe_informacje','', '0', '$kto');";


$wyk_zap=mysqli_query($naw_pol, $zapytanie);
  

  
if($wyk_zap){
echo "Udało się wysłać wniosek!";
	
}
else{
	echo "Nie udało się wysłać wniosku!";
}
} else { echo 'Jest już salon o takiej nazwie stworzony przez Ciebie.';}


} else {
//drugi krok wniosku

echo '<h2>Prosimy uzupełnić jeszcze następujące dane: </h2><br /><form action="" METHOD="POST">
  <div class="row mb-3">
    <label for="inputNip" class="col-sm-2 col-form-label">NIP: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNip" name="nip" required />
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputDodatkowe_informacje" class="col-sm-2 col-form-label">Dodatkowe informacje </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputDodatkowe_informacje" name="dodatkowe_informacje" required />
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputZalacznik" class="col-sm-2 col-form-label">Załącznik: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputZalacznik" name="zalacznik" placeholder="Tymczasowo nie jest obsługiwany" disabled />
    </div>
  </div>


<input type="hidden" name="nazwa_salonu" value="'.$_POST['nazwa_salonu'].'" /> 
<input type="hidden" name="ulica" value="'.$_POST['ulica'].'" /> 
<input type="hidden" name="miejscowosc" value="'.$_POST['miejscowosc'].'" /> 
<input type="hidden" name="kod_pocztowy" value="'.$_POST['kod_pocztowy'].'" /> 
<input type="hidden" name="data_otwarcia" value="'.$_POST['data_otwarcia'].'" /> 
<input type="submit" class="btn rozowyguzik w-100" name="guzik1" value="Potwierdź dane" />
</form>';

} 
} else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
}
echo '</div>';
?>