<?php 
    include '../config/database.php';

    // declaration des variables 
    $id = 0;
    $nom="";
    $prenom="";
    $email="";
    $telephone="";
    $password="";
    $passwordConfirm = "";
    $role = "";
    $sexe = "";
    $photo_profil = "";

    $errors = array();
    $success = false;
    $exist = false;
    $update = false;
    
    if(isset($_POST['ajouter'])){
        
        $nom = strtolower(addslashes($_POST['nom']));
        $prenom = strtolower(addslashes($_POST['prenom']));
        $email = strtolower(addslashes($_POST['email']));
        $telephone = strtolower(addslashes($_POST['telephone']));
        $password = md5($_POST['password']);
        $passwordConfirm = md5($_POST['passwordConfirm']);
        $role = strtolower(addslashes($_POST['role']));
        $sexe = strtolower(addslashes($_POST['sexe']));
        
        
        // validation du formulaire
        if(empty($nom)){
            array_push($errors, "Le nom de l'administrateur est obligatoire");
        }

        if(empty($prenom)){
            array_push($errors, "Le prenom de l'administrateur est obligatoire");
        }

        if(empty($email)){
            array_push($errors, "Le email de l'administrateur est obligatoire");
        }
        if(empty($telephone)){
            array_push($errors, "Le telephone de l'administrateur est obligatoire");
        }
        if(empty($password)){
            array_push($errors, "Le mot de passe de l'administrateur est obligatoire");
        }
        if(empty($passwordConfirm)){
            array_push($errors, "Confirmer le mot de passe  de l'administrateur ");
        }
        if(empty($role)){
            array_push($errors, "Le role de l'administrateur est obligatoire");
        }
        if(empty($sexe)){
            array_push($errors, "Le sexe de l'administrateur est obligatoire");
        }

        if(isset($_FILES['photo'])){
            //------- convert image to base64_encode------------------
            $image_path = $_FILES["photo"]["tmp_name"]; //this will be the physical path of your image
            if($image_path!=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $photo_profil = base64_encode($img_binary);
            }
        }

        if($password != $passwordConfirm){
            array_push($errors, "Les mot de passe ne confordent pas.");
        }

        // Verification pour voir cette categorie existe deja
        
        $query_check = "SELECT * FROM root WHERE email='$email'";
        $query_check_result = mysqli_query($db,$query_check);
        $resultat_check  = mysqli_fetch_assoc($query_check_result);
        
        if($resultat_check){
            // die(var_dump($resultat_check));
            if($resultat_check['email']== $email){
                array_push($errors,"L'administrateur existe déjà.");
                $exist = true;
            }
        }

        if(count($errors) == 0){
            // insetion dans la base de donnee
            $query = "INSERT INTO root (nom,prenom,telephone,email,role,password,sexe,photo_profil,date_creation) 
                                        VALUES('$nom','$prenom','$telephone','$email','$role','$password','$sexe','$photo_profil','$datepost')";

            // execution de la requete
            mysqli_query($db,$query);

           $success = true;
           
        }
        
    }

    if(isset($_POST['modifier']) || isset($_POST['supprimer'])){
        $id = addslashes($_POST['id']);
       
        // seletion de la categorie a modifier
        $query = "SELECT * FROM root WHERE id='$id'";
        $admins = mysqli_query($db,$query);

        $rows = mysqli_num_rows($admins);

        if($rows !=0){
            
            while($admin= mysqli_fetch_assoc($admins)){
                $id = $admin['id'];
                $nom = $admin['nom'];
                $prenom = $admin['prenom'];
                $email = $admin['email'];
                $telephone = $admin['telephone'];
                $password = $admin['password'];
                $role = $admin['role'];
                $sexe = $admin['sexe'];
               
            }
        }

    }

    if(isset($_POST['update'])){
        
        $id_admin = $_POST['id'];
        $nom = addslashes($_POST['nom']);
        $prenom = addslashes($_POST['prenom']);
        $email = strtolower(addslashes($_POST['email']));
        $telephone = strtolower(addslashes($_POST['telephone']));
        $password = md5($_POST['password']);
        $passwordConfirm = md5($_POST['passwordConfirm']);
        $role = strtolower(addslashes($_POST['role']));
        $sexe = strtolower(addslashes($_POST['sexe']));
       
        // die($icone_cate);
        // voir si l'image a mis a jour 
        if(isset($_FILES['photo'])){
            //------- convert image to base64_encode------------------
            $image_path = $_FILES["photo"]["tmp_name"]; //this will be the physical path of your image
            if($image_path!=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $photo_profil = base64_encode($img_binary);
                $photo= true;
            } 
        }

        if($photo){
            $update_query = "UPDATE root SET nom='$nom',
                            prenom = '$prenom',
                            email = '$email',
                            telephone = '$telephone',
                            password = '$password',
                            role = '$role',
                            sexe = '$sexe',
                            photo_profil = '$photo_profil' WHERE id='$id_admin'";
            // execution de la requete
            mysqli_query($db,$update_query);
            // die(mysqli_error($db));
             $update = true;
        } else {
            $update_query = "UPDATE root SET nom='$nom',
                            prenom = '$prenom',
                            email = '$email',
                            telephone = '$telephone',
                            password = '$password',
                            role = '$role',
                            sexe = '$sexe' WHERE id='$id_admin'";
            // execution de la requete
            mysqli_query($db,$update_query);
            // die(mysqli_error($db));
             $update = true;
        }
       
    }


    if(isset($_POST['delete'])){
       $id = $_POST['id'];
       $delete_query = "DELETE FROM root WHERE id='$id'";
       $db->query($delete_query);

       echo '<script language="Javascript">';
       echo 'document.location.replace("./film.php")'; // -->
       echo ' </script>';
    }
   
?>

<?php include 'views/admin-add.views.php';?>


<?php if($success): ?>
    <script type="text/javascript">
        $(document).ready(function(){
        swal("<?php echo 'Admin  '.$nom.' '.$prenom ?>", "ajouté avec succès","success");
            echo '<script language="Javascript">';
            echo 'document.location.replace("./film.php")'; // -->
            echo ' </script>';
        });
    </script>
<?php endif?>
<?php if($update): ?>
    <script type="text/javascript">
        $(document).ready(function(){
            document.location.replace("./admin-list.php");
            
        });
    </script>
<?php endif?>

<?php if($exist): ?>
    <script type="text/javascript">
        $(document).ready(function(){
        swal("<?php echo 'Admin  '.$nom.' '.$prenom ?>", "existe déjà","error");
            echo '<script language="Javascript">';
            echo 'document.location.replace("./film.php")'; // -->
            echo ' </script>';
        })
    </script>
<?php endif ?>