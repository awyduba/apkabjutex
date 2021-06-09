<?php
 require_once('db_connect.php');
 echo '<div class="container-fluid belka text-center"><h2>Lista wniosków o stworzenie salonu</h2></div><br />';
 echo '<div class="container">';
 if(isset($_SESSION['status'])=='administrator') {

 $identyfikator=$_POST['identyfikator'];
 $osoba=$_POST['osoba'];

  $zapytanie1="UPDATE wniosek_salon SET akceptacja='1' WHERE id_wniosku='$identyfikator';";
  // = 2, bo odrzucony (0-niezaakceptowany, 1-zaakceptowany, 2-odrzucony, 3-stworzony)

  $wyk_zap1=mysqli_query($naw_pol,$zapytanie1);
  
  // klient staje się właścicielem
  $zapytanie2="UPDATE uzytkownik SET id_typu='4' WHERE id_uzytkownika='$osoba';";

  $wyk_zap2=mysqli_query($naw_pol,$zapytanie2);


  if($wyk_zap1){
    echo 'Udało się zaakceptować wniosek.';
  } else {
    echo 'Nie udało się zaakceptować wniosku.';
  } 
  
  
}else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
}
?>
</div>