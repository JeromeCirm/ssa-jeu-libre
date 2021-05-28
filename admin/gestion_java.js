let Formulaire = document.getElementById("Formulaire")
let but=document.getElementById("but")
let inputid=document.getElementById("inputid")
let texte=document.getElementById("texte")
let lesinfos=document.getElementById("lesinfos")
let formulairecache=document.getElementById("formulairecache")
let touslescreneaux=document.getElementsByName("creneau[]")

function annuleTerrain(id,leterrain) {
    but.value="annuleterrain"
    inputid.value=id
    texte.value=leterrain
    Formulaire.submit()
}

function ajoutePersonne() {
    but.value="ajoutepersonne"
    Formulaire.submit()
}

function changeAdherent (id) {
    but.value="changeadherent"
    inputid.value=id
    Formulaire.submit()
}

function changeEtat(id,etat) {
    but.value="changeetat"
    inputid.value=id
    texte.value=etat
    Formulaire.submit()
}

function changeTerrain(id,leterrain) {
    but.value="changeterrain"
    inputid.value=id
    texte.value=leterrain
    Formulaire.submit()
}

function creationPDF() {
    but.value="creationpdf"
    Formulaire.submit()
}

function creationEnvoi() {
    but.value="creationenvoi"
    Formulaire.submit()
}

function fermerFormulaireCache() {
    formulairecache.style.display="none"
}

function maj_info(id) { // rendre visible la boite de commentaire pour le joueur id
    while (lesinfos.firstChild) {
        lesinfos.removeChild(lesinfos.lastChild);
    }   
    newNode = document.importNode(document.getElementById(id), true);
    lesinfos.appendChild(newNode)
}

function nouveau(idcreneau,terrain) {
    formulairecache.style.display="block"
    texte.value=terrain
    inputid.value=idcreneau
}

function reinitCreneau(id) {
    but.value="reinitcreneau"
    inputid.value=id
    Formulaire.submit()
}

function supprimeCreneau(id) { 
    but.value="supprimecreneau"
    inputid.value=id
    Formulaire.submit()
}

function valideCreneau(id) {
    but.value="validecreneau"
    inputid.value=id
    Formulaire.submit()
}

function valideFormulaire() {
    Formulaire.submit()
}

function valideFormulaireTous() {
    for (var unebox of touslescreneaux) {
        unebox.checked=true
    }
    Formulaire.submit();
}

