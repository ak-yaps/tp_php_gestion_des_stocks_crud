
<?php

include "utility.php";

$db = connectDB("localhost", "base_stock1", "root", "");

$produits = getProduits();



function getProduits(){
    global $db;
    $read = "SELECT * FROM produits";
    $exec = $db->query($read);

    return $exec->fetchAll(PDO::FETCH_OBJ);
}


?>
