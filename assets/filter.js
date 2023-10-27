import './styles/filter.scss';

//#region ------------------- Barre de recherche générique-------------------
function initializeSearch(searchInputId, resultContainerId, urlPath) {
    const searchInput = document.getElementById(searchInputId);
    const resultContainer = document.getElementById(resultContainerId);

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value;

        if (searchTerm === '') {
            resultContainer.innerHTML = '';
            return;
        }

        fetch(urlPath + '?nom=' + searchTerm)
            .then(response => response.json())
            .then(data => {
                resultContainer.innerHTML = '';
                if (data.length > 0) {
                    data.forEach(arme => {
                        resultContainer.innerHTML += `<p>${arme.nom}</p>`;
                    });
                } else {
                    resultContainer.innerHTML = '<p>Aucun résultat trouvé.</p>';
                }
            })
            .catch(error => console.error('Erreur lors de la requête AJAX : ', error));
    });
}
//#endregion ------------------- Barre de recherche générique-------------------