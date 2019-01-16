<?php 
    session_start();

    include 'config/database.php';

    // 
    if(isset($_GET['f'])){
        $id = addslashes($_GET['f']);
        $cat = addslashes($_GET['c']);
        $titre = addslashes($_GET['watch']);
        $film_resultat = mysqli_query($db,"SELECT * FROM film WHERE id='$id'");

        $filmbycategorie = mysqli_query($db,"SELECT * FROM film WHERE categorie_id='$cat'");
         
    }


    
        if(isset($_GET['favoris'])){
            if(isset($_SESSION['connected'])){
                if($_GET['favoris'] == 'yes'){
                    $id = addslashes($_GET['f']);
                    $userid = $_SESSION['id'];
                    // check if favoris exist
                    $checkfavoris =  mysqli_query($db,"SELECT * FROM favoris_film WHERE user_id='$userid' AND film_id='$id'");

                   
                    if (mysqli_num_rows($checkfavoris) != 0) {
                       
                    } else {
                        $filmfavoris = mysqli_query($db,"SELECT * FROM film WHERE id='$id'");
                        $array = $filmfavoris -> fetch_assoc();
                        
                        // die(var_dump($array));
                        $lien_video = $array['lien_film'];
                        $lien_cover= $array['cover_film'];
                        $titre_film = $array['nom'];
                        $categorie_id = $array['categorie_id'];

                        $filminsert = "INSERT INTO favoris_film (user_id,film_id,lien_video,lien_cover,titre_film,date_creation,categorie_id) 
                                        VALUES('$userid','$id','$lien_video','$lien_cover','$titre_film','$datepost','$categorie_id')";
                       
                       mysqli_query($db,$filminsert);

                    //    die(mysqli_error($db));
                    }
                    

                    

                    

                }
            } else{
                echo '<script language="Javascript">';
                echo 'document.location.replace("./index.php")'; // -->
                echo ' </script>';
            }
        }
?>
<?php include 'views/film.views.php';?>