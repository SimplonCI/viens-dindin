<?php
    session_start();
    include 'config/database.php';

    
     // requete
     $query_film = "SELECT * FROM film";
     // execution de la 
     $resultat_film = mysqli_query($db,$query_film);


     // requete
     $query_categorie= "SELECT * FROM categorie";
     // execution de la 
     $resultat_categorie = mysqli_query($db,$query_categorie);
?>



<?php
    include 'views/index.views.php';
?>