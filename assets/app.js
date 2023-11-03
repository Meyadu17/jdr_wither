import './styles/app.scss';

const bootstrap = require('bootstrap');

// #region message flash
// Sélectionnez tous les éléments avec la classe "flash-message"
const flashMessages = document.querySelectorAll('.alert-success');

// Définissez la durée pendant laquelle les messages flash resteront visibles (en millisecondes)
const messageDuration = 2000; // 2 secondes

// Masquez les messages flash après le délai défini
flashMessages.forEach((message) => {
    setTimeout(() => {
        message.style.display = 'none';
    }, messageDuration);
});
// #endregion message flash
