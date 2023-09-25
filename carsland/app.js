const modalTriggers = document.querySelectorAll(".modal-trigger");
const modalContainers = document.querySelectorAll(".modal-container");

// Récupérer l'URL de la page actuelle
const currentPageUrl = window.location.href;

// Sélectionner tous les éléments de navigation
const navItems = document.querySelectorAll('.navbar li');

// Sélectionnez l'élément <a> de l'onglet "Connexion" par son id.
const connexionLink = document.getElementById("connexion");

modalTriggers.forEach(trigger => {
    trigger.addEventListener("click", () => {
        const modalId = trigger.getAttribute("data-modal");
        const modal = document.getElementById(modalId);
        modal.classList.toggle("active");
    });
});

modalContainers.forEach(container => {
    container.addEventListener("click", (event) => {
        if (event.target.classList.contains("overlay") || event.target.classList.contains("close-modal")) {
            container.classList.remove("active");
        }
    });
});

// Parcourir les éléments de navigation pour trouver la correspondance
navItems.forEach(item => {
    const link = item.querySelector('a');
    if (link && link.href === currentPageUrl) {
        item.classList.add('active'); // Ajouter la classe "active" à l'élément correspondant
    }
});

document.addEventListener("DOMContentLoaded", function() {
    // Récupérer le lien de connexion par son identifiant
    var connexionLink = document.getElementById("connexion");

    // Effectuer une requête AJAX pour vérifier l'état de connexion
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "verif-con.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var isConnected = response.isConnected;

            // Mettre à jour le texte du lien en fonction de l'état de connexion
            if (isConnected) {
                connexionLink.textContent = "Déconnexion";
                connexionLink.href = "deconnexion.php"; // Mettez l'URL de déconnexion appropriée ici
            } else {
                connexionLink.textContent = "Connexion";
                connexionLink.href = "connexion.html"; // Mettez l'URL de connexion appropriée ici
            }
        }
    };
    xhr.send();
});

