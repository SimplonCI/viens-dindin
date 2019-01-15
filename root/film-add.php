<?php 
    include '../config/database.php';

    // declaration des variables 
    $nom = '';
    $cover = '';
    $date_sortie = '';
    $duree = '';
    $realisateur = '';
    $acteurs_principals = '';
    $categorie_id = '';
    $lien_film = '';
    $date_creation = $datepost;
    $root_id = 1;

    $errors = array();
    $success = false;
    $exist = false;
    $update = false;
    // $categorie_id_select = 0;

   

    if(isset($_POST['ajouter'])){
        
        $nom = strtolower(addslashes($_POST['nom']));
        $date_sortie = strtolower(addslashes($_POST['date_sortie']));
        $duree = strtolower(addslashes($_POST['duree']));
        $realisateur = strtolower(addslashes($_POST['realisateur']));
        $acteurs_principals = strtolower(addslashes($_POST['acteurs_principals']));
        $categorie_id = strtolower(addslashes($_POST['categorie_id']));
        $lien_film = $_POST['lien_film'];

        // die($date_creation);
        // validation du formulaire
        if(empty($nom)){
            array_push($errors, "Le nom de la catégorie est obligatoire");
        }
        if(empty($date_sortie)){
            array_push($errors, "La date de sortie du film est obligatoire");
        }
        if(empty($duree)){
            array_push($errors, "La durée du film est obligatoire");
        }
        if(empty($realisateur)){
            array_push($errors, "Le nom du réalisateur du film est obligatoire");
        }
        if(empty($acteurs_principals)){
            array_push($errors, "Le nom des pricipaux acteurs du film est obligatoire");
        }
        if(empty($categorie_id)){
            array_push($errors, "La catégorie du film est obligatoire");
        }
        if(empty($lien_film)){
            array_push($errors, "Le lien du film est obligatoire");
        }

        if(isset($_FILES['cover'])){
            //------- convert image to base64_encode------------------
            $image_path = $_FILES["cover"]["tmp_name"]; //this will be the physical path of your image
            if($image_path!=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $cover = base64_encode($img_binary);
            }
        }

        // Verification pour voir ce film existe deja
        
        $query_check = "SELECT * FROM film WHERE nom='$nom'";
        $query_check_result = mysqli_query($db,$query_check);
        $resultat_check  = mysqli_fetch_assoc($query_check_result);
        
        if($resultat_check){
            // die(var_dump($resultat_check));
            if($resultat_check['nom']== $nom){
                array_push($errors,"Ce film existe déjà");
                $exist = true;
            }
        }

        
        
        if(count($errors) == 0){
            // insetion dans la base de donnee
            
            $query = "INSERT INTO film (nom,date_de_sortie,duree,realisateur,acteurs_principals,categorie_id,lien_film,cover_film,root_id,date_creation)
                    VALUES('$nom','$date_sortie','$duree','$realisateur','$acteurs_principals','$categorie_id','$lien_film','$cover','1','$date_creation')";

            // execution de la requete
            mysqli_query($db,$query);
            
           $success = true;

           

           
        }
        
    }

    if(isset($_POST['modifier']) || isset($_POST['supprimer'])){
        $id = addslashes($_POST['id']);
        
        // seletion de la categorie a modifier
        $query = "SELECT * FROM film WHERE id='$id'";
        $films = mysqli_query($db,$query);

        $rows = mysqli_num_rows($films);
        // die(var_dump($rows));
        if($rows !=0){
            
            while($film= mysqli_fetch_assoc($films)){
                $nom = $film['nom'];
                $cover = $film['cover'];
                $date_sortie = $film['date_de_sortie'];
                $duree = $film['duree'];
                $realisateur = $film['realisateur'];
                $acteurs_principals = $film['acteurs_principals'];
                $categorie_id = $film['categorie_id'];
                $lien_film = $film['lien_film'];
                $cover = $film['cover'];
                $date_creation = $film['date_creation'];
                $root_id = $film['root_id'];
                
                // die($categorie_id);
            }
        }

    }

    if(isset($_POST['update'])){
        // die(var_dump($_POST));
        $nom = addslashes($_POST['nom']);
        $id_film = addslashes($_POST['id']);
        
        $nom = strtolower(addslashes($_POST['nom']));
        $date_sortie = strtolower(addslashes($_POST['date_sortie']));
        $duree = strtolower(addslashes($_POST['duree']));
        $realisateur = strtolower(addslashes($_POST['realisateur']));
        $acteurs_principals = strtolower(addslashes($_POST['acteurs_principals']));
        $categorie_id = strtolower(addslashes($_POST['categorie_id']));
        $lien_film = $_POST['lien_film'];
        $cover =  $_POST['cover_film'];
       
        // die($icone_cate);
        // voir si l'image a mis a jour 
        if(isset($_FILES['cover'])){
            //------- convert image to base64_encode------------------
            $image_path = $_FILES["cover"]["tmp_name"]; //this will be the physical path of your image
            if($image_path!=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $cover = base64_encode($img_binary);
                $cover_update = true;
            } 
        }

        if($cover_update){
            $update_query = "UPDATE film SET nom='$nom',date_de_sortie='$date_sortie',
                            duree='$duree',realisateur='$realisateur',
                            acteurs_principals='$acteurs_principals',
                            categorie_id = '$categorie_id',
                            cover_film='$cover'
                            WHERE id='$id_film'";
            // execution de la requete
            mysqli_query($db,$update_query);
            // die(mysqli_error($db));
             $update = true;
        } else {
            $update_query = "UPDATE film SET nom='$nom',date_de_sortie='$date_sortie',
                            duree='$duree',realisateur='$realisateur',
                            acteurs_principals='$acteurs_principals',
                            categorie_id = '$categorie_id'
                            WHERE id='$id_film'";
            mysqli_query($db,$update_query);
            // die(mysqli_error($db));
             $update = true;
        }
    //    die(mysqli_error($db));
    }


    if(isset($_POST['delete'])){
       $id = $_POST['id'];
       $delete_query = "DELETE FROM film WHERE id='$id'";
       $db->query($delete_query);

       echo '<script language="Javascript">';
       echo 'document.location.replace("./film.php")'; // -->
       echo ' </script>';
    }
   
         // execution de la 
    $resultat_categorie = mysqli_query($db,"SELECT * FROM categorie");
    
?>

<?php include 'views/film-add.views.php';?>


<?php if($success): ?>
    <script type="text/javascript">
        $(document).ready(function(){
        swal("<?php echo 'la catégorie '.$nom ?>", "ajouté avec succès","success");
            console.log('hello');
        });
    </script>
<?php endif?>
<?php if($update): ?>
    <script type="text/javascript">
        $(document).ready(function(){
        swal("<?php echo 'la catégorie '.$nom ?>", "été mise a  jour","success");
            console.log('hello');
        });
    </script>
<?php endif?>

<?php if($exist): ?>
    <script type="text/javascript">
        $(document).ready(function(){
        swal("<?php echo 'la catégorie '. $nom ?>", "existe déjà","error");
            console.log('hello');
        })
    </script>
<?php endif ?>