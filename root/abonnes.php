

<?php 
    include '../config/database.php';

    // requete
    $query = "SELECT * FROM users";
    // execution de la 
    $resultat = mysqli_query($db,$query);


    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $delete_query = "DELETE FROM root WHERE id='$id'";
        $db->query($delete_query);
 
        echo '<script language="Javascript">';
        echo 'document.location.replace("./abonnes.php")'; // -->
        echo ' </script>';
     }

?>

<?php include 'views/abonne.views.php';?>