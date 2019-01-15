$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='serieForm']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        nom: {
          required: true,
         
        },
        icone: {
          required: false,
        }
      
      },
      // Specify validation error messages
      messages: {
        nom: "Le nom de la série est obligatoire",
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      // submitHandler: function(form) {
      //   form.submit();
      // }
      submitHandler: submitForm()
    });
  
  
    function submitForm() {
      var data = $("#serieForm").serialize();
      $.ajax({
        type : 'POST',
        url : 'serie-add.php',
        data : data,
        // beforeSend: function() {
        // $("#error").fadeOut();
        // $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
        // }
      })
    }
  });