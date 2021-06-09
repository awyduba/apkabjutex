<?php
 require_once('db_connect.php');
 echo '<div class="container-fluid belka text-center"><h2>Moje salony</h2></div><br />';
 echo '<div class="container-fluid">';
 if(isset($_SESSION['status'])=='właściciel') {

$kto=$_SESSION['kto'];

//wyswietlenie salonow
$zapytanie="SELECT id_salonu, nazwa_salonu, ulica, miejscowosc, kod_pocztowy, nip, salon.nr_telefonu, opis, godziny_otwarcia from salon inner join wniosek_salon on salon.id_wniosku=wniosek_salon.id_wniosku inner join uzytkownik on wniosek_salon.id_wlasciciela=uzytkownik.id_uzytkownika where id_uzytkownika='$kto'";
$wyk_zap=mysqli_query($naw_pol, $zapytanie);
 
if(mysqli_num_rows($wyk_zap)<1){
    
    echo 'Nie masz żadnych salonów.';
} else {
    
  echo '<table class="table table-striped table-responsive ml-auto"><tr>
  <td><b>#</b></td>
  <td><b>nazwa salonu</b></td>
  <td><b>ulica</b></td>
  <td><b>miejsowość</b></td>
  <td><b>kod pocztowy</b></td>
  <td><b>nip</b></td>
  <td><b>nr telefonu do salonu</b></td>
  <td><b>opis</b></td>
  <td><b>godziny otwarcia</b></td>
  <td><b>modyfikuj<b></td>
  <td><b>usuń</b></td>
 </tr>';
  
  while($wpis=mysqli_fetch_array($wyk_zap)){
   echo '<tr>
   <td>'.$wpis[0].'</td>';
   echo '<td>'.$wpis[1].'</td>';
   echo '<td>'.$wpis[2].'</td>';
   echo '<td>'.$wpis[3].'</td>';
   echo '<td>'.$wpis[4].'</td>';
   echo '<td>'.$wpis[5].'</td>';
   echo '<td>'.$wpis[6].'</td>';
   echo '<td>'.$wpis[7].'</td>';
   echo '<td>'.$wpis[8].'</td>';
 

   echo '<td><form action="index.php?url=lista_salonow_edit_wyk" method="POST">';
   echo '<input type="hidden" name="tabela" value="users" />';
   echo '<input type="hidden" name="identyfikator" value="'.$wpis[0].'" />';

   echo '<input class="btn btn-primary" type="submit" value="Modyfikuj" name="modyfikuj" disabled /></form></td>';
 //disabled 


   echo '<td><form action="index.php?url=lista_salonow_delete" method="POST">';
   echo '<input type="hidden" name="identyfikator1" value="'.$wpis[0].'" />';

   echo '<input class="btn btn-danger" type="submit" value="Usuń" name="usun" disabled /></form></td>';
//disabled

   echo '</tr>';
  }
   echo '</table>';
  
}

}

else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
}
?>
</div>