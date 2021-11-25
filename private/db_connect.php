<?php
$servername = 'Localhost';
$dbname = 'easytravel';
$userName = 'admin';
$password = 'admin1234';

try{

    $con = new PDO ("mysql:host = $servername;dbname = $dbname", $userName,$password);

    $con->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);

    echo "Connection Success";


}
catch(PDOException $e){
    echo "Error in connection " . $e ->getMessage();

} 
?>
