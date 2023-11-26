
// --------------------------------------------validation-Connection-------------------------------------------------
function validateAndSubmitConnForm() {
    // Valider les champs du formulaire
    if (validateConnForm()) {

        document.getElementById('submitConnBtn').type = 'submit';
        document.getElementById('inscriptionForm').submit();
        
    }
}

function validateConnForm() {
    var form = document.getElementById('inscriptionForm');
    var inputs = form.getElementsByTagName('input');
    var isValid = true;

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type === 'text' || inputs[i].type === 'password' || inputs[i].type === 'email') {
            if (inputs[i].value.trim() === '') {
                inputs[i].style.border = '1px solid red';
                isValid = false;
            } else {
                inputs[i].style.border = ''; // Réinitialiser la bordure
            }
        }
    }

    return isValid;
}

// ------------------------------------------------------Validation_Inscription-----------------------------------------
// function validateAndSubmitInscForm() {
//     if (validateInscForm()) {
//         openRoleSelectionModal();
//         // Cacher la popup d'inscription
//         closeInscriptionModal();
//     }
// }

// function validateInscForm() {
//     var form = document.getElementById('inscriptionForm2');
//     var inputs = form.getElementsByTagName('input');
//     var isValid = true;

//     for (var i = 0; i < inputs.length; i++) {
//         if (inputs[i].type === 'text' || inputs[i].type === 'password' || inputs[i].type === 'email') {
//             if (inputs[i].value.trim() === '') {
//                 inputs[i].style.border = '1px solid red';
//                 isValid = false;
//             } else {
//                 inputs[i].style.border = ''; 
//             }
//         }
//     }

//     return isValid;
// }









