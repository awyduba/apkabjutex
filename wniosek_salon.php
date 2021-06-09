<?php
 require_once('db_connect.php');
 echo '<div class="container-fluid belka text-center"><h2>Wniosek o salon</h2></div><br />';
 echo '<div class="container">';
 if(isset($_SESSION['status'])=='klient') {

    //pierwsza czesc wniosku

?>
    

    <form action="index.php?url=wniosek_salon1" METHOD="POST">
    <div class="row mb-3">
      <label for="inputNazwa_salonu" class="col-sm-2 col-form-label">Nazwa salonu: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputNazwa_salonu" name="nazwa_salonu" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputUlica" class="col-sm-2 col-form-label">Ulica: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputUlica" name="ulica" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputMiejscowosc" class="col-sm-2 col-form-label">Miejscowość: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputMiejscowosc" name="miejscowosc" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputKod_pocztowy" class="col-sm-2 col-form-label">Kod pocztowy: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputKod_pocztowy" name="kod_pocztowy" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputData_otwarcia" class="col-sm-2 col-form-label">Planowana data otwarcia: </label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputData_otwarcia" name="data_otwarcia" required>
      </div>
    </div>
    
    
    <button type="submit" class="btn rozowyguzik w-100" name="guzik" value="Dalej">Dalej</button>
    </form>
    
    <?php
   } else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
}
?>
</div>