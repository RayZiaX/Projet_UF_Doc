var btnConnexion = document.querySelector('#btn_connexion');
var btnInscription = document.querySelector('#btn_incription');
var btnSubmit = document.querySelector('#envoie');

btnConnexion.addEventListener('click',function(){
    window.location.href = "./pages/connexion.html"
})

btnInscription.addEventListener('click',function(){
    window.location.href = "./pages/inscription.html"
})

btnSubmit.addEventListener('submit', function(){
    window.location.href = "./pages/recherche.html"
})