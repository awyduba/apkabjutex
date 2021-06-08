<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/opis.css" />
    <title>Bjutex</title>
    <link rel="shortcut icon" href="images/logo_ikona.png">
		  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
  </script>
  </head>
  <body>
     <?php
     	require_once('db_connect.php');
      include_once('menu.php');
if (!isset($_REQUEST['url'])) {
			$url='glowna';
	}
	else {
			$url=$_REQUEST['url'];
	}
	
	switch ($url) {
	
	case 'glowna':
		include('glowna.php');
		break;

    case 'rejestracja':
    include('rejestracja.php');
    break; 

    case 'rejestracja1':
      include('rejestracja1.php');
      break;   
      
    case 'logowanie':
    include('logowanie.php');
    break;  

    case 'wyloguj':
		include('wyloguj.php');
		break;       
		
	default:
		include('glowna.php');
		break;
	
	}
    ?>
     

     
     
     
     
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <hr />
    <div class="container pb-5">
  <div class="row align-items-start">
    <div class="col">
      <h4>Klient</h4>
      Fryzjerzy<br />
      Kosmetyczki<br />
      Pomoc<br />

    </div>
    <div class="col">
      <h4>Pracownik</h4>  
      Fryzjerzy<br />
      Kosmetyczki<br />
      Pomoc<br />
    </div>
    <div class="col">
     <h4>Właściciel</h4>
      Fryzjerzy<br />
      Kosmetyczki<br />
      Pomoc<br />
    </div>
    <div class="col">
      <h4>Serwis</h4>
      Fryzjerzy<br />
      Kosmetyczki<br />
      Pomoc<br />
    </div>
  </div>
</div>
    <div class="footer text-center">
			Bjutex 2021 &copy; Maciej Niedośpiał & Adrian Szczęśniak & Julia Włodarczyk & Aleksander Wyduba
		</div>


  </body>
</html>