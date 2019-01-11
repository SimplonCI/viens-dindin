function formValidation(){
    var nom = document.forms['categorieForm']['nom'].value;
    // var icone  = document.categorieFrom.icone

    if (nom == "")
    {
        alert("Please input a Value");
        return false;
    }
    else 
    {
        alert('Code has accepted : you can try another');
        return true; 
    }

}


function allLetter(uname)
{ 
    var letters = /^[A-Za-z]+$/;
    if(uname.value.match(letters))
    {
        return true;
    }
    else
    {
        alert('Username must have alphabet characters only');
        return false;
    }
}