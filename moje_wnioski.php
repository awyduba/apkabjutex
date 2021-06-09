<?php
 require_once('db_connect.php');
 echo '<div class="container-fluid belka text-center"><h2>Moje wnioski o stworzenie salonu</h2></div><br />';
 echo '<div class="container-fluid">';
 if(isset($_SESSION['status'])=='właściciel') {

$kto=$_SESSION['kto'];

//wyswietlenie uzytkownikow
$zapytanie="SELECT id_wniosku, nazwa_salonu, ulica, miejscowosc, kod_pocztowy, nip, data_otwarcia, dodatkowe_informacje, zalacznik, akceptacja from wniosek_salon inner join uzytkownik on wniosek_salon.id_wlasciciela=uzytkownik.id_uzytkownika where id_wlasciciela='$kto' and akceptacja='1' or akceptacja='0' or akceptacja='2'";

$wyk_zap=mysqli_query($naw_pol, $zapytanie);
  if(mysqli_num_rows($wyk_zap)<1){echo 'Nie masz żadnych wniosków.';} else {//sprawdzenie czy są wnioski
  echo '<table class="table table-striped table-responsive ml-auto"><tr>
  <td><b>#</b></td>
  <td><b>nazwa salonu</b></td>
  <td><b>ulica</b></td>
  <td><b>miejscowosc</b></td>
  <td><b>kod pocztowy</b></td>
  <td><b>nip</b></td>
  <td><b>planowana data otwarcia</b></td>
  <td><b>dodatkowe informacje</b></td>
  <td><b>załącznik</b></td>
  <td><b>akceptacja</b></td>
  <td><b>modyfikuj<b></td>
 </tr>';
  
  while($wpis=mysqli_fetch_array($wyk_zap)){
   echo '<tr>';
   echo '<td>'.$wpis[0].'</td>';
   echo '<td>'.$wpis[1].'</td>';
   echo '<td>'.$wpis[2].'</td>';
   echo '<td>'.$wpis[3].'</td>';
   echo '<td>'.$wpis[4].'</td>';
   echo '<td>'.$wpis[5].'</td>';
   echo '<td>'.$wpis[6].'</td>';
   echo '<td>'.$wpis[7].'</td>';
   echo '<td>'.$wpis[8].'</td>';
   if($wpis[9]=='1'){
   echo '<td>zaakceptowany</td>';
   }
   else if($wpis[9]=='0'){
    echo '<td>oczekujący</td>'; 
   }
   else if($wpis[9]=='2'){
    echo '<td>odrzucony</td>'; 
   } else if($wpis[9]=='3'){
    echo '<td>salon stworzony</td>'; 
   }else {
    echo '<td>error</td>';  
   }
   
if($wpis[9]=='1'){
   echo '<td><form action="index.php?url=moje_wnioski_uzupelnij" method="POST">';
   
   echo '<input type="hidden" name="identyfikator" value="'.$wpis[0].'" />';

   echo '<input class="btn btn-primary" type="submit" value="Uzupełnij dane i stwórz salon" name="akceptuj" /></form></td>';
}
   
 else {
    echo '<td></td>';
}echo '</tr>';
  }
   echo '</table>';
  
}

}

else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
}
?>
</div>