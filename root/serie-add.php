<?php 
    include '../config/database.php';

    // declaration des variables 
    $nom = '';
    $icone = '';
    $maison_production = '';
    $categorie_id = '';
    $errors = array();
    $success = false;
    $exist = false;
    $update = false;
    
    if(isset($_POST['ajouter'])){
        
        $nom = strtolower(addslashes($_POST['nom']));
        $maison_production = strtolower(addslashes($_POST['maison_production']));
        $categorie_id = strtolower(addslashes($_POST['categorie_id']));

        
        // validation du formulaire
        if(empty($nom)){
            array_push($errors, "Le nom de la catégorie est obligatoire");
        }
        if(empty($categorie_id)){
            array_push($errors, "La catégorie est obligatoire");
        }
        if(empty($maison_production)){
            array_push($errors, "La maison de production est obligatoire");
        }

        if(isset($_FILES['icone'])){
            //------- convert image to base64_encode------------------
            $image_path = $_FILES["icone"]["tmp_name"]; //this will be the physical path of your image
            if($image_path!=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $icone = base64_encode($img_binary);
            }
        }

        // Verification pour voir cette serie existe deja
        
        $query_check = "SELECT * FROM serie WHERE nom='$nom'";
        $query_check_result = mysqli_query($db,$query_check);
        $resultat_check  = mysqli_fetch_assoc($query_check_result);
        
        if($resultat_check){
            // die(var_dump($resultat_check));
            if($resultat_check['nom']== $nom){
                array_push($errors,"Cette serie existe déjà");
                $exist = true;
            }
        }

        if(count($errors) == 0){
            // insetion dans la base de donnee
            $query = "INSERT INTO serie (nom,cover,resumer,category_id,root_id,date_creation) 
                            VALUES('$nom','$icone','resumer','$icone','1','$datepost')";

            // execution de la requete
            mysqli_query($db,$query);

           $success = true;
           
        }
        
    }

    if(isset($_POST['modifier']) || isset($_POST['supprimer'])){
        $id = addslashes($_POST['id']);
       
        // seletion de la serie a modifier
        $query = "SELECT * FROM serie WHERE id='$id'";
        $series = mysqli_query($db,$query);

        $rows = mysqli_num_rows($series);

        if($rows !=0){
            
            while($serie= mysqli_fetch_assoc($series)){
                $nom = $serie['nom'];
                $icone = $serie['icon'];
               
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
            $update_query = "UPDATE serie SET nom='$nom' AND icon='$icone' WHERE id='$id_cat'";
            // execution de la requete
            mysqli_query($db,$update_query);
            // die(mysqli_error($db));
             $update = true;
        } else {
            $update_query = "UPDATE serie SET nom='$nom'  WHERE id='$id_cat'";
            // execution de la requete
            mysqli_query($db,$update_query);
            // die(mysqli_error($db));
             $update = true;
        }
       
    }


    if(isset($_POST['delete'])){
       $id = $_POST['id'];
       $delete_query = "DELETE FROM serie WHERE id='$id'";
       $db->query($delete_query);

       echo '<script language="Javascript">';
       echo 'document.location.replace("./serie.php")'; // -->
       echo ' </script>';
    }

    // execution de la 
    $resultat_categorie = mysqli_query($db,"SELECT * FROM categorie");
   
?>

<?php include 'views/serie-add.views.php';?>


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