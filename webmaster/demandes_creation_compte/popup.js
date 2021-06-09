
function popupInfosCovoitureur(nom,prenom,num_telephone,mail,utilisateur_image)
{
    document.getElementById("nomCovoitureur").setAttribute("value",nom);

    document.getElementById("prenomCovoitureur").setAttribute("value",prenom);

    document.getElementById("numCovoitureur").setAttribute("value",num_telephone);

    document.getElementById("mailCovoitureur").setAttribute("value",mail);

    document.getElementById("lienImageCovoitureur").setAttribute("src",utilisateur_image);
}

function popupInfosVoiture(marque,modele,annee,couleur,nbr_place,voiture_image)
{
	document.getElementById("marqueVoiture").setAttribute("value",marque);

    document.getElementById("modeleVoiture").setAttribute("value",modele);

    document.getElementById("anneeVoiture").setAttribute("value",annee);

    document.getElementById("couleurVoiture").setAttribute("value",couleur);

    document.getElementById("placesVoiture").setAttribute("value",nbr_place);

    document.getElementById("lienImageVoiture").setAttribute("src",voiture_image);
}

function popupAccepter(id,mailAdd)
{
    document.getElementById("idAccepter").setAttribute("value",id);

    document.getElementById("mailAccepter").setAttribute("value",mailAdd);
}

function popupRefuser(idCovoitureur,idVoiture,mailDel)
{
    document.getElementById("idCovoitureur").setAttribute("value",idCovoitureur);

    document.getElementById("idVoiture").setAttribute("value",idVoiture);

    document.getElementById("mailRefuser").setAttribute("value",mailDel);
}