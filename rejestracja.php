<?php

include('db_connect.php');

//pierwsza czesc rejestracji
?>

<div class="container-fluid belka text-center"><h2>Rejestracja </h2></div>

<br /><div class="container text-left">
<form action="index.php?url=rejestracja1" METHOD="POST">
<div class="row mb-3">
  <label for="inputImie" class="col-sm-2 col-form-label">Imię: </label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputImie" name="imie" required>
  </div>
</div>
<div class="row mb-3">
  <label for="inputNazwisko" class="col-sm-2 col-form-label">Nazwisko: </label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputNazwisko" name="nazwisko" required>
  </div>
</div>
<div class="row mb-3">
  <label for="inputData" class="col-sm-2 col-form-label">Data urodzenia: </label>
  <div class="col-sm-10">
    <input type="date" class="form-control" id="inputData" name="data_urodzenia" required>
  </div>
</div>


<div class="row mb-3">
  <label for="inputPlec" class="col-sm-2 col-form-label">Płeć: </label>
  <div class="col-sm-10">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="plec" id="inputPlec1" value="mężczyzna">
  <label class="form-check-label" for="inlineRadio1">Mężczyzna</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="plec" id="inputPlec2" value="kobieta">
  <label class="form-check-label" for="inlineRadio2">Kobieta</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="plec" id="inputPlec3" value="inna">
  <label class="form-check-label" for="inlineRadio3">Inna</label>
</div>

</div>
</div>

<div class="row mb-3">
  <label for="inputEmail" class="col-sm-2 col-form-label">E-mail: </label>
  <div class="col-sm-10">
    <input type="email" class="form-control" id="inputEmail" name="email" required>
  </div>
</div>
<div class="row mb-3">
  <label for="inputNrTel" class="col-sm-2 col-form-label">Numer telefonu: </label>
  <div class="col-sm-10">
    <input type="tel" class="form-control" id="inputNrTel" name="nrtel" pattern="[0-9]{9}">
  </div>
</div>

<button type="submit" class="btn rozowyguzik w-100" name="guzik" value="Dalej">Dalej</button>
</form></div>


