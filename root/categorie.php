
<?php 
    include '../config/database.php';

    // requete
    $query = "SELECT * FROM categorie";
    // execution de la 
    $resultat = mysqli_query($db,$query);

?>


<?php include 'views/categorie-list.views.php';?>
