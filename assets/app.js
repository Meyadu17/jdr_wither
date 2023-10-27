import './styles/app.scss';

const bootstrap = require('bootstrap');

//#region ------------------- Accordion -------------------

// Attend que le DOM (Document Object Model) soit entièrement chargé avant d'exécuter le code
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne tous les éléments ayant la classe CSS 'accordion-item' et les stocke dans un tableau
    const accordionItems = document.querySelectorAll('.accordion-item');

    // Pour chaque élément de l'accordéon, ajoute un écouteur d'événements au bouton d'accordéon
    accordionItems.forEach((item) => {
        // Sélectionne le bouton spécifique à cet élément
        const accordionButton = item.querySelector('.accordion-button');

        // Ajoute un écouteur d'événements au clic sur le bouton
        accordionButton.addEventListener('click', () => {
            // Ouvrez ou fermez l'élément de l'accordéon actuel en basculant la classe CSS 'show' sur l'élément de collapse (rétraction)
            const collapse = item.querySelector('.accordion-collapse');
            collapse.classList.toggle('show');
        });
    });
});

//#endregion ------------------- Accordion -------------------

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
