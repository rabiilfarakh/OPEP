//popup_Inscription
function openInscriptionModal() {
    document.getElementById('inscriptionModal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    // Ajouter la classe pour styliser la popup du rôle
    document.getElementById('roleSelectionModal').classList.add('style-popup');
}
function closeInscriptionModal() {
    document.getElementById('inscriptionModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    // Supprimer la classe lorsque la popup d'inscription est fermée
    document.getElementById('roleSelectionModal').classList.remove('style-popup');
}

//popup_Role
function openRoleSelectionModal() {
    var roleSelectionModal = document.getElementById('roleSelectionModal');
    roleSelectionModal.style.display = 'block';
    // Ajouter la classe pour styliser la popup du rôle
    roleSelectionModal.classList.add('style-popup');
}
function closeRoleModal() {
    document.getElementById('roleSelectionModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    // Supprimer la classe lorsque la popup de sélection du rôle est fermée
    document.getElementById('roleSelectionModal').classList.remove('style-popup');
}

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
function validateAndSubmitInscForm() {
    if (validateInscForm()) {
        openRoleSelectionModal();
        // Cacher la popup d'inscription
        closeInscriptionModal();
    }
}

function validateInscForm() {
    var form = document.getElementById('inscriptionForm2');
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






