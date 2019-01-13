$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='filmFrom']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        nom: {
          required: true,
        },
        cover: {
          required: true,
        },
        date_sortie:{
            required: true,
        },
        duree:{
            required: true,
        },
        realisateur:{
            required:true,
        },
        acteurs_principals:{
            required: true,
        },
        categorie_id: {
            required: true,
        },
        lien_film:{
            required: true,
        }
      
      },
      // Specify validation error messages
      messages: {
        nom: "Le nom du film est obligatoire",
        lien_film: "Le lien  du film est obligatoire",
        categorie_id: "La categorie du film est obligatoire",
        acteurs_principalsm: "Le nom des principaux acteurs du film est obligatoire",
        realisateur: "Le realisateur du film est obligatoire",
        duree: "La durée du film est obligatoire",
        date_sortie: "La date de sorite du film est obligatoire",
        cover: "Le cover du film est obligatoire",
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      // submitHandler: function(form) {
      //   form.submit();
      // }
      submitHandler: submitForm()
    });
  
  
    function submitForm() {
      var data = $("#categorieFrom").serialize();
      $.ajax({
        type : 'POST',
        url : 'categorie-add.php',
        data : data,
        // beforeSend: function() {
        // $("#error").fadeOut();
        // $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
        // }
      })
    }
  });