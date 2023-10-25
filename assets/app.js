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
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()
//#endregion ------------------- Contrôle form -------------------
