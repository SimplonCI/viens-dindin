
<?php 
    include '../config/database.php';

    // requete
    $query = "SELECT * FROM root";
    // execution de la 
    $resultat = mysqli_query($db,$query);

?>



<?php include 'views/admin-list.views.php';?>