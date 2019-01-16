$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='loginForm']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        username: {
          required: true,
        },
        password: {
          required: true,
        }
      
      },
      // Specify validation error messages
      messages: {
        username: " le nom d'utilisateur est obligatoire ",
        password: "Le mot de passe est obligatoire",
        
      },
     
      submitHandler: submitForm()
    });
  
  
    function submitForm() {
      var data = $("#loginForm").serialize();
      $.ajax({
        type : 'POST',
        url : 'login.php',
        data : data,
       
      })
    }
  });