// Fonction qui s'exécute au chargement de la page
window.onload = function() {
    // Récupérer les paramètres de l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    // Vérifier le statut et afficher le message approprié
    const messageDiv = document.getElementById('message');
    if (status === 'success') {
        alert('Votre message a été envoyé avec succès !')
        messageDiv.innerHTML = '<p style="color: green;">Votre message a été envoyé avec succès !</p>';
    } else if (status === 'error') {
        messageDiv.innerHTML = '<p style="color: red;">Il y a eu une erreur lors de l\'envoi du message. Veuillez réessayer.</p>';
    }
};
document.getElementById('mon-cv').addEventListener('click', function() {
    let cvUrl = "documents/cv-alternance.pdf";
    window.open(cvUrl, '_blank');
})
document.getElementById('rapport').addEventListener('click', function() {
    let cvUrl = "documents/Récapitulatif de Fin de Stage.pdf";
    window.open(cvUrl, '_blank');
})

    document.getElementById("fa-bars").addEventListener("click", function(){
    let menu = document.getElementById("menu")
    if (menu.style.display==="none"){
        menu.style.display="block";
    }else {
        menu.style.display="none";
    }
    }

);
document.querySelector(".A-Propos").addEventListener("mouseover",function () {
    let DivA = document.querySelector(".A-Pro i")
    DivA.style.backgroundColor="red";
});
