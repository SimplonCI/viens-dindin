<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

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

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>

<form id="regForm" method="post" action="" accept="image/*"  enctype="multipart/form-data">
  <h1>Inscrivez vous !</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Nom:
    <p><input placeholder="First name..." oninput="this.className = ''" name="fname" type= "text"></p>
    <p><input placeholder="Last name..." oninput="this.className = ''" name="lname" type= "text"></p>
    Selectionner une image:
    <input type="file" name="photo"><BR>
  </div>
  <div class="tab">Contact:
    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email" type= "text"></p>
    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone" type= "text"></p>
    </div>
    <div class="tab"> Date de naissance:
    <p><input placeholder="dd/mm/yyyy" oninput="this.className = ''" name="dnaissance" type= "date"></p>
    <p> Genre</p>

Male      <input type="radio" name="gender"  value="MASCULIN" checked>
<br>
Feminin   <input type="radio" name="gender" value="FEMININ">
  </div>
  <div class="tab">mot de passe:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname" type= "text"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password" id= "password"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)" >Next</button>
      <button  type="submit" class="submit-form-btn" name= "envoyer">envoyer</button>

    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
<?php

          include "config.php";

          if(isset($_POST['envoyer'])){


              $name= addslashes($_POST ['fname']);
            //  $VILLE= addslashes($_POST ['ville']);

              $prenom= addslashes($_POST ['lname']);
              $email=addslashes($_POST ['email']);


              $password= md5($_POST ['pword']);
              $phone=addslashes($_POST ['phone']);
              $dnaissance= addslashes($_POST ['dnaissance']);
              $gender= addslashes($_POST ['gender']);


              $image_path=$_FILES["photo"]["tmp_name"];
              if($image_path!=""){
              $img_binary=fread(fopen($image_path, "r"), filesize($image_path));
              $picture=base64_encode($img_binary);


              $query=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

              $rows=mysqli_num_rows($query);
              if ($rows!=1) {
                // $array=$query->fetch_assoc();
                mysqli_query($conn, "INSERT INTO users(id,nom,prenom,email,password,telephone,date_naissance,sexe,photo_profil,premium_user,date_creation) VALUES ('','$name','$prenom','$email','$password','$phone','$dnaissance','$gender','$picture','','$datepost')");

                echo "<center style ='color:red'>Inscription Reussie...</center>";
                echo "<br>";
                echo "<center style ='color:GREEN'>Vous pouvez vous connecter votre compte </center><br>";
                echo "<a href = 'connexion.views.php'>";
                echo " <center>ICI</center>";
                echo "</b></a>";
                echo "</font>";
                
              }


}
}


  	mysqli_close($conn);


 ?>
 <script>
 var currentTab = 0; // Current tab is set to be the first tab (0)
 showTab(currentTab); // Display the crurrent tab

 function showTab(n) {
   // This function will display the specified tab of the form...
   var x = document.getElementsByClassName("tab");
   x[n].style.display = "block";
   //... and fix the Previous/Next buttons:
   if (n == 0) {
     document.getElementById("prevBtn").style.display = "none";
   } else {
     document.getElementById("prevBtn").style.display = "inline";
   }
   if (n == (x.length - 1)) {
     document.getElementById("nextBtn").innerHTML = "Annuler";
   } else {
     document.getElementById("nextBtn").innerHTML = "suivant";
   }
   //... and run a function that will display the correct step indicator:
   fixStepIndicator(n)
 }

 function nextPrev(n) {
   // This function will figure out which tab to display
   var x = document.getElementsByClassName("tab");
   // Exit the function if any field in the current tab is invalid:
   if (n == 1 && !validateForm()) return false;
   // Hide the current tab:
   x[currentTab].style.display = "none";
   // Increase or decrease the current tab by 1:
   currentTab = currentTab + n;
   // if you have reached the end of the form...
   if (currentTab >= x.length) {
     // ... the form gets submitted:
     document.getElementById("regForm").submit();
     return false;
   }
   // Otherwise, display the correct tab:
   showTab(currentTab);
 }

 function validateForm() {
   // This function deals with validation of the form fields
   var x, y, i, valid = true;
   x = document.getElementsByClassName("tab");
   y = x[currentTab].getElementsByTagName("input");
   // A loop that checks every input field in the current tab:
   for (i = 0; i < y.length; i++) {
     // If a field is empty...
     if (y[i].value == "") {
       // add an "invalid" class to the field:
       y[i].className += " invalid";
       // and set the current valid status to false
       valid = false;
     }
   }
   // If the valid status is true, mark the step as finished and valid:
   if (valid) {
     document.getElementsByClassName("step")[currentTab].className += " finish";
   }
   return valid; // return the valid status
 }

 function fixStepIndicator(n) {
   // This function removes the "active" class of all steps...
   var i, x = document.getElementsByClassName("step");
   for (i = 0; i < x.length; i++) {
     x[i].className = x[i].className.replace(" active", "");
   }
   //... and adds the "active" class on the current step:
   x[n].className += " active";
 }
 </script>


</body>
</html>
