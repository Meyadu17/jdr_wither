import './styles/formControl.scss';
//#region ------------------- Contrôle form -------------------

document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        //décladation des variables
        let requiredFields = form.querySelectorAll(".required-field");
        let integerFields = form.querySelectorAll(".positive-integer");
        let floatFields = form.querySelectorAll(".positive-float");

        // Supprimer les messages d'erreur existants
        let errorMessages = form.querySelectorAll(".error-message");
        errorMessages.forEach(function (errorMessage) {
            errorMessage.parentNode.removeChild(errorMessage);
        });

        //massage d'erreur pour les champs required-field
        requiredFields.forEach(function (field) {
            if (field.value.trim() === "") {
                event.preventDefault(); // Empêche la soumission du formulaire

                // Créer un élément de message d'erreur
                let errorMessage = document.createElement("div");
                errorMessage.className = "error-message alert alert-danger";
                errorMessage.textContent = "Le champ est requis.";

                // Insérer le message d'erreur après le champ
                field.parentNode.appendChild(errorMessage);
            }
        });

        //massage d'erreur pour les champs positive-integer
        integerFields.forEach(function (field) {
            const value = field.value.trim(); // Obtenir la valeur du champ sans les espaces

            if (value !== "") {
                const intValue = parseInt(value, 10);
                if (isNaN(intValue) || intValue < 0) {
                    event.preventDefault(); // Empêche la soumission du formulaire

                    // Créer un élément de message d'erreur
                    let errorMessage = document.createElement("div");
                    errorMessage.className = "error-message alert alert-danger";
                    errorMessage.textContent = "La valeur doit être un entier positif.";

                    // Insérer le message d'erreur après le champ
                    field.parentNode.appendChild(errorMessage);
                }
            }
        });
        // Validation pour les champs positive-float
        floatFields.forEach(function (field) {
            const value = field.value.trim();

            if (value !== "") {
                const floatValue = parseFloat(value);
                if (isNaN(floatValue) || floatValue < 0) {
                    event.preventDefault();

                    // Créer un élément de message d'erreur
                    let errorMessage = document.createElement("div");
                    errorMessage.className = "error-message alert alert-danger";
                    errorMessage.textContent = "Le format est incorrect, veuillez entrer un nombre supérieur ou égal à 0.";

                    // Insérer le message d'erreur après le champ
                    field.parentNode.appendChild(errorMessage);
                }
            }
        });
    });
});

//#endregion ------------------- Contrôle form -------------------