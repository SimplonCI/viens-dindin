
<?php 
    session_start();
    if(isset($_SESSION['connected'])){
        echo '<script language="Javascript">';
        echo 'document.location.replace("./index.php")'; // -->
        echo ' </script>';
    }
    include 'config/database.php';

    // declaration des variables
    $username = '';
    $password = '';
    
    $errors = array();
    
    if(isset($_POST['connexion'])){
        $username = strtolower(addslashes($_POST['username']));
        $password = md5($_POST['password']);
        // die($password);
        // check if user exist
        $user_check_query = "SELECT * FROM users WHERE email='$username' AND password='$password'";
        $result_check_query = mysqli_query($db,$user_check_query);
        $rows = mysqli_num_rows($result_check_query);

        // die(var_dump($rows));
        if($rows != 0){
            // die("start");
            while($user = mysqli_fetch_assoc($result_check_query)){
               
                    session_start();
                     $_SESSION['email'] = $user['email'];
                     $_SESSION['nom'] = $user['nom'];
                     $_SESSION['prenom'] = $user['prenom'];
                     $_SESSION['telephone'] = $user['telephone'];
                     $_SESSION['premium'] = $user['premium_user'];
                     $_SESSION['photo_profil'] = $user['photo_profil'];
                     $_SESSION['connected'] = true;
                     $_SESSION['id'] = $user['id'];

                    echo '<script language="Javascript">';
                    echo 'document.location.replace("./index.php")'; // -->
                    echo ' </script>';
               
            } 
        }else{
            array_push($errors,"Adresse email ou mot de passe incorrect");
        }
    }


    if(isset($_GET['logout'])){
        
        session_destroy();
        echo '<script language="Javascript">';
        echo 'document.location.replace("./index.php")'; // -->
        echo ' </script>';
    }
    
?>
<?php include 'views/login.views.php'?>