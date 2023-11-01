import './styles/formControl.scss';
// Attend que le document HTML soit complètement chargé
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionne le formulaire dans le document
    let form = document.querySelector("form");

    // Ajoute un gestionnaire d'événement lors de la soumission du formulaire
    form.addEventListener("submit", function (event) {
        // Supprime les messages d'erreur existants du formulaire
        let errorMessages = form.querySelectorAll(".error-message");
        errorMessages.forEach(function (errorMessage) {
            errorMessage.parentNode.removeChild(errorMessage);
        });

        // Fonction générique pour afficher un message d'erreur
        function displayErrorMessage(field, message) {
            event.preventDefault(); // Empêche la soumission du formulaire

            // Crée un élément div pour afficher le message d'erreur
            let errorMessage = document.createElement("div");
            errorMessage.className = "error-message alert alert-danger";
            errorMessage.textContent = message;

            // Ajoute le message d'erreur à l'élément parent du champ de formulaire
            field.parentNode.appendChild(errorMessage);
        }

        // Fonction pour valider les champs de texte requis
        function validateRequiredField(field) {
            if (field.value.trim() === "") {
                displayErrorMessage(field, "Le champ est requis.");
            }
        }

        // Fonction pour valider les entiers positifs
        function validatePositiveIntegerField(field) {
            const value = field.value.trim();
            if (value !== "") {
                const intValue = parseInt(value, 10);
                if (isNaN(intValue) || intValue < 0) {
                    displayErrorMessage(field, "La valeur doit être un entier positif.");
                }
            }
        }

        // Fonction pour valider les nombres à virgule positive
        function validatePositiveFloatField(field) {
            const value = field.value.trim();
            if (value !== "") {
                const floatValue = parseFloat(value);
                if (isNaN(floatValue) || floatValue < 0) {
                    displayErrorMessage(field, "Le format est incorrect, veuillez entrer un nombre supérieur ou égal à 0.");
                }
            }
        }

        // Sélectionne les champs requis, les champs entiers positifs et les champs décimaux positifs
        let requiredFields = form.querySelectorAll(".required-field");
        let integerFields = form.querySelectorAll(".positive-integer");
        let floatFields = form.querySelectorAll(".positive-float");

        // Applique la validation aux champs requis, entiers positifs et décimaux positifs
        requiredFields.forEach(validateRequiredField);
        integerFields.forEach(validatePositiveIntegerField);
        floatFields.forEach(validatePositiveFloatField);
    });
});



//#endregion ------------------- Contrôle form -------------------