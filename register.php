<?php
    // include database
    include 'config/database.php';

    // declaration des variables
    $fullname = '';
    $email = '';
    $password = '';
    $passwordConfirm = '';
    $telephone = '';

    // tableau d'erreur
    $errors = array();
    // quand le formulaire est soumis
    if(isset($_POST['signup'])){
        $fullname = addslashes($_POST['nom']);
        $email = addslashes($_POST['email']);
        
        
        $telephone = addslashes($_POST['telephone']);

        if(empty($fullname)){
            array_push($errors,"Votre nom est obligatoire");
        }

        if(empty($email)){
            array_push($email,"Votre adresse email est obligatoire");
        }

        if(empty($telephone)){
            array_push($errors,"Votre telephone est obligatoire");
        }

        if(empty($_POST['password'])){
            array_push($errors,"Le mot de passe  est obligatoire");
        }else{
            $password = md5($_POST['password']);
            $passwordConfirm = md5($_POST['re_pass']);
        }

        if($password != $passwordConfirm){
            array_push($errors,"Les mots de passe ne concordent pas");
        }

        // check pour voir si l'utilisateur existe deja
        $user_check_query = "SELECT * FROM users WHERE email='$email'";
        $user_resultat_query = mysqli_query($db,$user_check_query);
        // $rows = mysqli_num_rows($user_resultat_query);
        
        // die(var_dump($user_resultat_query));
        if($user_resultat_query){
            
            array_push($errors,"Adresse email déjà utilisée");
        }


        if(count($errors) === 0){
            
            $query = "INSERT INTO users (fullname,email,telephone,password,date_creation)
                        VALUES('$fullname','$email','$telephone','$password','$datepost')";

            mysqli_query($db,$query);
            
            echo '<script language="Javascript">';
            echo 'document.location.replace("./login.php")'; // -->
            echo ' </script>';
        }

        mysqli_close($db);
    }
?>

<?php include 'views/register.views.php';?>