<?php
 require_once('db_connect.php');
 echo '<div class="container-fluid belka text-center"><h2>Lista wniosków o stworzenie salonu</h2></div><br />';
 echo '<div class="container-fluid">';
 if(isset($_SESSION['status'])=='administrator') {

//wyswietlenie uzytkownikow
$zapytanie="SELECT id_wniosku, nazwa_salonu, ulica, miejscowosc, kod_pocztowy, nip, data_otwarcia, dodatkowe_informacje, zalacznik, akceptacja, imie, nazwisko, id_wlasciciela from wniosek_salon inner join uzytkownik on wniosek_salon.id_wlasciciela=uzytkownik.id_uzytkownika order by id_wniosku desc; ";

$wyk_zap=mysqli_query($naw_pol, $zapytanie);
  if(mysqli_num_rows($wyk_zap)<1){echo 'Nie ma żadnych wniosków.';} else {//sprawdzenie czy są użytkownicy
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
  <td><b>imię i nazwisko właściciela</b></td>
  <td><b>status<b></td>
  <td><b>modyfikuj<b></td>
  <td><b></b></td>
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
   echo '<td>'.$wpis[10].' '.$wpis[11].'</td>';
   if($wpis[9]=='1'){
    echo '<td>zaakceptowany</td>';
    }
    else if($wpis[9]=='0'){
     echo '<td>oczekujący</td>'; 
    }
    else if($wpis[9]=='2'){
     echo '<td>odrzucony</td>'; 
    }
    else if($wpis[9]=='3'){
      echo '<td>salon stworzony</td>'; 
     } else {
     echo '<td>error</td>';  
    }
  

   if($wpis[9]=='0'){
   echo '<td><form action="index.php?url=lista_wnioskow_akceptuj" method="POST">';
   echo '<input type="hidden" name="identyfikator" value="'.$wpis[0].'" />';
   echo '<input type="hidden" name="osoba" value="'.$wpis[12].'" />';

   echo '<input class="btn btn-primary" type="submit" value="Akceptuj" name="akceptuj" /></form></td>';
 
   echo '<td><form action="index.php?url=lista_wnioskow_odrzuc" method="POST">';
   echo '<input type="hidden" name="identyfikator1" value="'.$wpis[0].'" />';

   echo '<input class="btn btn-danger" type="submit" value="Odrzuć" name="odrzuc" /></form></td>';
   }
   else {
     echo '<td></td><td></td>';
   }
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