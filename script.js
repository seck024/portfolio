
document.getElementById('mon-cv').addEventListener('click', function() {
    let cvUrl = "portfolio-teste/documents/cv-alternance.pdf";
    window.open(cvUrl, '_blank');
})
document.getElementById('rapport').addEventListener('click', function() {
    let cvUrl = "portfolio-teste/documents/Récapitulatif de Fin de Stage.pdf";
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
