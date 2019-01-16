<!-- Bootstrap -->
<link href="../assets/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet">


<?php 
    session_start();
    
    if(!isset($_SESSION['connecte'])  && !$_SESSION['connecte']){
        echo '<script language="Javascript">';
        echo 'document.location.replace("./login.php")'; // -->
        echo ' </script>';
    }
?>

<?php include 'partials/_sidebar.php';?>
<?php include 'partials/_navbar.php';?>