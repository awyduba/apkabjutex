<?php
require_once('stale.php');


$naw_pol=mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DBBAZA);
if(!$naw_pol) {
	
echo 'Nie udało się nawiązać połączenia z bazą danych<br />';
echo 'Komunikat: '.mysqli_connect_error();
}


?>