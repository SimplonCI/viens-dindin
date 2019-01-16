<html>
<head>
<title>Se Connecter</title>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#logForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

p {
  text-align: center;
  color: red;
  text-decoration: underline;
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */


/* Hide all steps by default: */

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

</style>
</head>
<body>


  <form method = "POST" action = "" id= "logform">
      <p>Se connecter</p>
  Email : <input type = "text" name = "email"><BR>
  PASSWORD : <input type = "password" name = "password"><BR>
  <input type = "submit" name = "LOGIN" value = "LOGIN">
   </form>

  <?php
  include 'config.php';
  if(isset($_POST['LOGIN'])){
    $email = addslashes($_POST ['email']);
    $password = md5($_POST ['password']);
    $query = mysqli_query($conn, "SELECT * FROM users WHERE password='$password' AND name ='$email'");
    $rows = mysqli_num_rows($query);
          if($rows==1){
          $array = $query->fetch_assoc();
          session_start();
          $_SESSION['logged_in']= true;
          $_SESSION['id'] = $array['id'];
          $_SESSION['name'] = $array['name'];
          echo '<script language="Javascript">';
          echo 'document.location.replace("./page.php")'; // -->
          echo ' </script>';
          }else{
          echo "</center>";
          echo "<font color = 'red'>";
  	      echo "Unknown user";
          echo "</font>";
          echo "<br>";
          echo "</center>";
          }
  }
  mysqli_close($conn);
  ?>

</body>
</html>
