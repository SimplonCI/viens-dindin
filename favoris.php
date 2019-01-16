<?php 
    session_start();

    if(!isset($_SESSION['connected'])){
        echo '<script language="Javascript">';
        echo 'document.location.replace("./login.php")'; // -->
        echo ' </script>';
    }

    // include database
    include 'config/database.php';

    // seletion des favoris des l'utilisateur
    $id = 0;
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'] ;

        // requete
        $query = "SELECT * FROM favoris_film WHERE user_id='$id'";
        // execution de la requete
        $resultat_film = mysqli_query($db,$query);


    }

    
?>

<?php include 'views/favoris.views.php'; ?>