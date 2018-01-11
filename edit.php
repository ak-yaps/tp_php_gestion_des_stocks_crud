<?php include "traitement.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Gestion des stocks</title>
</head>
<body>

<div class="edit_form">
  <h2>Modifier</h2>

   <form class="formulaire" action="traitement.php?id=<?php echo $prod->id ?>" method="post">
    <input type="text" name="name" value="<?php echo $prod->nom ?>" required><br>
    <input type="number" name="prix" min="0" max="1000" value="<?php echo $prod->prix ?>"><br>
    <input type="text" name="description"value="<?php echo $prod->description ?>"><br>
    <input type="submit" name="modifier" value="modifier" id="valider">
  </form>
</div>
</body>
</html>
