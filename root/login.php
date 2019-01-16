
<?php 
    include '../config/database.php';

    // declaration des variables
    $username = '';
    $password = '';
    
    $errors = array();
    
    if(isset($_POST['connexion'])){
        $username = strtolower(addslashes($_POST['username']));
        $password = md5($_POST['password']);
        // die($username);
        // check if user exist
        $user_check_query = "SELECT * FROM root WHERE email='$username' AND password='$password'";
        $result_check_query = mysqli_query($db,$user_check_query);
        // $rows = mysqli_num_rows($result_check_query);

        
        if($result_check_query ){
            while($admin = mysqli_fetch_assoc($result_check_query)){
                if ($admin['email'] == $username && $password == $admin['password']) {
                     session_start();
                     $_SESSION['email'] = $admin['email'];
                     $_SESSION['nom'] = $admin['nom'];
                     $_SESSION['prenom'] = $admin['prenom'];
                     $_SESSION['photo_profil'] = $admin['photo_profil'];
                     $_SESSION['connecte'] = true;

                    echo '<script language="Javascript">';
                    echo 'document.location.replace("./index.php")'; // -->
                    echo ' </script>';
                } else {
                    array_push($errors,"Adresse email ou mot de passe incorrecte");
                }
                
            }
        }else{
            array_push($errors,"Adresse email ou mot de passe incorrecte");
        }
    }

    
?>
<?php include 'views/login.views.php';?>