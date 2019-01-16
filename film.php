<?php 
    session_start();

    include 'config/database.php';

    // 
    if(isset($_GET['f'])){
        $id = addslashes($_GET['f']);
        $titre = addslashes($_GET['watch']);
        $film_resultat = mysqli_query($db,"SELECT * FROM film WHERE id='$id'");
        
       
    }
?>
<?php include 'views/film.views.php';?>