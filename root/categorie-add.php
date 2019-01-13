<?php 
    include '../config/database.php';

    // declaration des variables 
    $nom = '';
    $icone = '';
    $errors = array();
    $success = false;
    $exist = false;
    
    if(isset($_POST['ajouter'])){
        
        $nom = strtolower(addslashes($_POST['nom']));

        
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
        
        $query_check = "SELECT * FROM categorie WHERE nom='$nom'";
        $query_check_result = mysqli_query($db,$query_check);
        $resultat_check  = mysqli_fetch_assoc($query_check_result);
        
        if($resultat_check){
            // die(var_dump($resultat_check));
            if($resultat_check['nom']== $nom){
                array_push($errors,"Cette catégorie existe déjà");
                $exist = true;
            }
        }

        if(count($errors) == 0){
            // insetion dans la base de donnee
            $query = "INSERT INTO categorie (nom,icon,root_id,date_creation) VALUES('$nom','$icone','1','$datepost')";

            // execution de la requete
            mysqli_query($db,$query);

           $success = true;
           
        }
        
    }

    if(isset($_POST['modifier']) || isset($_POST['supprimer'])){
        $id = addslashes($_POST['id']);
       
        // seletion de la categorie a modifier
        $query = "SELECT * FROM categorie WHERE id='$id'";
        $categories = mysqli_query($db,$query);

        $rows = mysqli_num_rows($categories);

        if($rows !=0){
            
            while($categorie= mysqli_fetch_assoc($categories)){
                $nom = $categorie['nom'];
                $icone = $categorie['icon'];
               
            }
        }

    }

    if(isset($_POST['update'])){
        $nom = addslashes($_POST['nom']);
        $id_cat = addslashes($_POST['id']);
        
       
        // die($icone_cate);
        // voir si l'image a mis a jour 
        if(isset($_FILES['icone'])){
            //------- convert image to base64_encode------------------
            $image_path = $_FILES["icone"]["tmp_name"]; //this will be the physical path of your image
            if($image_path!=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $icone = base64_encode($img_binary);
                $icone_update = true;
            } 
        }

        if($icone_update){
            $update_query = "UPDATE categorie SET nom='$nom' AND icon='$icone' WHERE id='$id_cat'";
            // execution de la requete
            mysqli_query($db,$update_query);
            // die(mysqli_error($db));
             $update = true;
        } else {
            $update_query = "UPDATE categorie SET nom='$nom'  WHERE id='$id_cat'";
            // execution de la requete
            mysqli_query($db,$update_query);
            // die(mysqli_error($db));
             $update = true;
        }
       
    }


    if(isset($_POST['delete'])){
       $id = $_POST['id'];
       $delete_query = "DELETE FROM categorie WHERE id='$id'";
       $db->query($delete_query);

       echo '<script language="Javascript">';
       echo 'document.location.replace("./categorie.php")'; // -->
       echo ' </script>';
    }
   
?>

<?php include 'views/categorie-add.views.php';?>


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