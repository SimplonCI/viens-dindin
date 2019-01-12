<?php 
    include '../config/database.php';

    // declaration des variables 
    $nom = '';
    $icone = '';
    $errors = array();
    
    if(isset($_POST['ajouter'])){
        
        $nom = addslashes($_POST['nom']);

        
        // validation du formulaire
        if(empty($nom)){
            array_push($errors, "Le nom de la catégorie est obligatoire");
        }

        if(isset($_FILES['icone'])){
            //------- convert image to base64_encode------------------
            $image_path = $_FILES["icone"]["tmp_name"]; //this will be the physical path of your image
            if($image_path!=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $icone = base64_encode($img_binary);
            }
        }

        // Verification pour voir cette categorie existe deja
        $nom = strtolower($nom);
        $query_check = "SELECT * categorie WHERE nom='$nom'";
        $query_check_result = mysqli_query($db,$query_check);
        $resultat_check  = mysqli_fetch_assoc($query_check_result);
        
        if($resultat_check){
            if($resultat_check['nom']== strtolower($nom)){
                array_push($errors,"Cette catégorie existe déjà");
            }
        }

        if(count($errors) == 0){
            // insetion dans la base de donnee
            $query = "INSERT INTO categorie (nom,icon,root_id,date_creation) VALUES('$nom','$icone','1','$datepost')";

            // execution de la requete
            mysqli_query($db,$query);

            // die(mysqli_error($db));
            // check if categorie add in database
            // if($db->query($sql)== false){
            //     die("Requete false");
            // }
        }
        
    }


   
?>

<?php include 'views/categorie-add.views.php';?>