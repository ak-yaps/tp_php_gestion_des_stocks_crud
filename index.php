<?php  include "produits.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Gestion de Stocks</title>
 <script type="text/javascript" src="app.js"></script>
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <nav>
   <ul>
     <li><a href="#enter_product">Entrer un nouveau produit</a></li>
     <li><a href="#products_table">Voir les produits en stock</a></li>
   </ul>
 </nav>
   <div class="enter_form" id="enter_product">
     <h2>Entrer nouveau produit</h2>

     <form class="formulaire" action= "traitement.php" method="post">
       <input type="text" name="name" placeholder="nom du produit" id="name" required><br>
       <input type="number" name="prix" placeholder="entrez prix en euros" min="0" max="1000" id="prix" required><br>
       <input type="text" name="description" value="" placeholder="Mettre une description" id="description" required><br>
       <input type="submit" name="btn" value="valider" id="valider">
     </form>
   </div>

 <div class="form" id="products_table">
   <h2>Vos produits</h2>
   <table>
     <thead>
       <tr>
         <th>id</th>
         <th>nom</th>
         <th>prix</th>
         <th>description</th>
         <th>modifier</th>
         <th> <button id="delete" type="button" name="button">supprimer</button> </th>
       </tr>
     </thead>
     <tbody id="tabBody">
         <?php
           foreach($produits as $produit){
             echo "<tr>";
             foreach($produit as $prop =>$val){
                 $col_name = isset($val) ? $val : "N.R";
                 echo "<td>" . $col_name . "</td>";
             }
             echo "<td>
             <a class=\"tabler-btn\" href=\"edit.php?id=$produit->id\">modifier</a>
             </td>";

             echo "<td class=\"deleteProduit\"><input id=\"user_$produit->id\" name=\"delete_produits_id[]\"
             type=\"checkbox\" value=\"$produit->id\" /></td>";
         }
         echo"</tr>";
         ?>
     </tbody>o
   </table>

 </div>

</body>

</html>
