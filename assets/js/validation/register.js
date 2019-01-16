$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='register-form']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        nom: {
          required: true,
        },
        password:{
            required:true,
        },
        re_pass:{
            required: true,
        },
        telephone: {
            required: true,
        },
        email:{
            required: true,
        }
      
      },
      // Specify validation error messages
      messages: {
        nom: "Le nom del'adminstrateur est obligatoire",
        prenom: "Le prenom de l'adminstrateur est obligatoire",
        email: "L' email de l'adminstrateur est obligatoire",
        telephone: "Le telephone de l'adminstrateur est obligatoire",
        password: "Le mot de pas de l'adminstrateur est obligatoire",
        re_pass: "Veuillez confirmer le mot de passe l'adminstrateur",
       
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      // submitHandler: function(form) {
      //   form.submit();
      // }
      submitHandler: submitForm()
    });
  
  
    function submitForm() {
      var data = $("#register-form").serialize();
      $.ajax({
        type : 'POST',
        url : 'register.php',
        data : data,
        // beforeSend: function() {
        // $("#error").fadeOut();
        // $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
        // }
      })
    }
  });