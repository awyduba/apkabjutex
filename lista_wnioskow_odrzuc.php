<?php
 require_once('db_connect.php');
 echo '<div class="container-fluid belka text-center"><h2>Lista wniosków o stworzenie salonu</h2></div><br />';
 echo '<div class="container">';
 if(isset($_SESSION['status'])=='administrator') {

 $identyfikator=$_POST['identyfikator1'];

  $zapytanie1="UPDATE wniosek_salon SET akceptacja='2' WHERE id_wniosku='$identyfikator';";
  // = 2, bo odrzucony (0-niezaakceptowany, 1-zaakceptowany, 2-odrzucony, 3-stworzony)

  $wyk_zap1=mysqli_query($naw_pol,$zapytanie1);

  if($wyk_zap1){
    echo 'Udało się odrzucić wniosek.';
  } else {
    echo 'Nie udało się odrzucić wniosku.';
  } 
  
  
}else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
}
?>
</div>