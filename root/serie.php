
<?php 
    include '../config/database.php';

    // requete
    $query = "SELECT * FROM serie";
    // execution de la 
    $resultat = mysqli_query($db,$query);

?>


<?php include 'views/serie-list.views.php';?>
