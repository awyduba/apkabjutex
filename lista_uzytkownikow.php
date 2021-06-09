<?php
 require_once('db_connect.php');
 echo '<div class="container-fluid belka text-center"><h2>Lista użytkowników</h2></div><br />';
 echo '<div class="container-fluid">';
 if(isset($_SESSION['status'])=='administrator') {

//wyswietlenie uzytkownikow
$zapytanie="SELECT id_uzytkownika, imie, nazwisko, plec, data_urodzenia, nr_telefonu, email, zgoda1, zgoda2, login, haslo, nazwa_typu from uzytkownik inner join typ_uzytkownika on uzytkownik.id_typu=typ_uzytkownika.id_typu";
$wyk_zap=mysqli_query($naw_pol, $zapytanie);
  if(mysqli_num_rows($wyk_zap)<1){echo 'Nie ma żadnych użytkowników.';} else {//sprawdzenie czy są użytkownicy
  echo '<table class="table table-striped table-responsive ml-auto"><tr>
  <td><b>#</b></td>
  <td><b>imie</b></td>
  <td><b>nazwisko</b></td>
  <td><b>płeć</b></td>
  <td><b>data urodzenia</b></td>
  <td><b>nr telefonu</b></td>
  <td><b>email</b></td>
  <td><b>zgoda1</b></td>
  <td><b>zgoda2</b></td>
  <td><b>login</b></td>
  <td><b>haslo</b></td>
  <td><b>status</b></td>
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
   echo '<td>'.$wpis[9].'</td>';
   echo '<td>'.$wpis[10].'</td>';
   echo '<td>'.$wpis[11].'</td>';

   echo '<td><form action="index.php?url=lista_uzytkownikow_edit_wyk" method="POST">';
   echo '<input type="hidden" name="tabela" value="users" />';
   echo '<input type="hidden" name="identyfikator" value="'.$wpis[0].'" />';

   echo '<input class="btn btn-primary" type="submit" value="Modyfikuj" name="modyfikuj" /></form></td>';
 
   echo '<td><form action="index.php?url=lista_uzytkownikow_delete" method="POST">';
   echo '<input type="hidden" name="identyfikator1" value="'.$wpis[0].'" />';

   echo '<input class="btn btn-danger" type="submit" value="Usuń" name="usun" /></form></td>';
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