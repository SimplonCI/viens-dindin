<?php
    session_start();

    if(isset($_GET['logout'])){
        session_destroy();
        echo '<script language="Javascript">';
        echo 'document.location.replace("login.php")'; // -->
        echo ' </script>';
    }

?>

<?php include 'views/index.views.php'?>