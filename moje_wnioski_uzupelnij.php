<?php
 require_once('db_connect.php');
 echo '<div class="container-fluid belka text-center"><h2>Lista wniosków o stworzenie salonu</h2></div><br />';
 echo '<div class="container">';
 if(isset($_SESSION['status'])=='właściciel') {

    if(isset($_POST['guzik1'])){

        $nr_telefonu= $_POST['nr_telefonu'];
        $opis= $_POST['opis'];
        $godziny_otwarcia= $_POST['godziny_otwarcia'];
        $id_wniosku= $_POST['id_wniosku'];

        $zapytanie3="SELECT id_salonu from salon where id_wniosku='$id_wniosku';";
        $wyk_zap3=mysqli_query($naw_pol, $zapytanie3);
        
        if(mysqli_num_rows($wyk_zap3)==0){



        $zapytanie="INSERT INTO salon (nr_telefonu, opis, godziny_otwarcia, id_wniosku)
        VALUES ('$nr_telefonu','$opis','$godziny_otwarcia','$id_wniosku');";
        
        
        $wyk_zap=mysqli_query($naw_pol, $zapytanie);
          

        $zapytanie1="UPDATE wniosek_salon SET akceptacja='3' WHERE id_wniosku='$id_wniosku';";
        // = 2, bo odrzucony (0-niezaakceptowany, 1-zaakceptowany, 2-odrzucony, 3-stworzony)
      
        $wyk_zap1=mysqli_query($naw_pol,$zapytanie1);

        
          
        if($wyk_zap){
        echo "Udało się stworzyć salon!";
            
        }
        else{
            echo "Nie udało się stworzyć salonu!";
        }
    } else {
        echo "Taki salon już istnieje w bazie!";
    }


    }else { ?>

    <form action="" METHOD="POST">
    <div class="row mb-3">
      <label for="inputNumer_telefonu_do_salonu" class="col-sm-2 col-form-label">Numer telefonu salonu: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputNumer_telefonu_do_salonu" name="nr_telefonu" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputOpis" class="col-sm-2 col-form-label">Opis salonu: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputOpis" name="opis" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputGodziny_otwarcia" class="col-sm-2 col-form-label">Godziny otwarcia: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputGodziny_otwarcia" name="godziny_otwarcia" required>
      </div>
    </div>
    
    <?php 
   echo '<input type="hidden" name="id_wniosku" value="'.$_POST['identyfikator'].'" />';
     ?>

    <button type="submit" class="btn rozowyguzik w-100" name="guzik1" value="Dalej">Dalej</button>
    </form>
    
    <?php
 }
   } else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
}
?>
</div>