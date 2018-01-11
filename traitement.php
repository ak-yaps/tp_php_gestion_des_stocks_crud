<?php

include "utility.php";

$db = connectDB("localhost", "base_stock1", "root", "");

if(isset($_POST["btn"])){
    createProduits();
}

$prod= getProd($_GET["id"]);


if(isset($_POST["modifier"])){
    updateproduits($_GET["id"]);


}

if ($_POST["action"] === "delete_prod"){
    deleteProduits(json_decode($_POST["id"]));
        header('Location: index.php');
}


function createProduits() {
    global $db;

    $sql = "INSERT INTO produits (nom, prix, description)
    VALUES (:name, :prix, :description)";

    $query = $db->prepare($sql);
    $query->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
    $query->bindParam(":prix", $_POST["prix"], PDO::PARAM_INT);
    $query->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
    header('Location: index.php');
}

function updateproduits($id) {
  global $db;

  $sql = "UPDATE produits SET nom = :name, prix = :prix, description = :description WHERE id = $id";

  $statement = $db->prepare($sql);
  $statement->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
  $statement->bindParam(":prix", $_POST["prix"], PDO::PARAM_INT);
  $statement->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
  $check = $statement->execute();
  header('Location: index.php');
}

function deleteProduits($id){

        $supp = "DELETE FROM produits where id = $id";
        $stat = $db->prepare($supp);
        $stat->bindParam($id, $id, PDO::PARAM_INT);
        $res = $stat->execute();
        echo $res;


}
function deleteUser() {

    global $db;
    foreach ($_POST["delete_user_id"] as $id) {
        $sql = "DELETE FROM users WHERE id = $id";
         $exec = $db->query($sql);
         header("Location: index.php");
         debug($id);
    }

}
function getProd($id){
    global $db;
    $read = "SELECT * FROM produits WHERE id = :id";
    $stat = $db->prepare($read);
    $stat->bindParam(":id", $id , PDO::PARAM_INT);
    $stat->execute();
    return $stat->fetch(PDO::FETCH_OBJ);
}




?>
