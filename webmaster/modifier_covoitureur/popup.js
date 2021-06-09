
function popupModifCovoitureur(nom,prenom,num_telephone,mail,utilisateur_image,idCov)
{
    document.getElementById("nomCovoitureur").setAttribute("value",nom);

    document.getElementById("prenomCovoitureur").setAttribute("value",prenom);

    document.getElementById("numCovoitureur").setAttribute("value",num_telephone);

    document.getElementById("mailCovoitureur").setAttribute("value",mail);

    document.getElementById("lienImageCovoitureur").setAttribute("src",utilisateur_image);

    document.getElementById("idCovoitureur").setAttribute("value",idCov);
}

function popupModifVoiture(marque,modele,annee,couleur,nbr_place,voiture_image,idVoit)
{
	document.getElementById("marqueVoiture").setAttribute("value",marque);

    document.getElementById("modeleVoiture").setAttribute("value",modele);

    document.getElementById("anneeVoiture").setAttribute("value",annee);

    document.getElementById("couleurVoiture").setAttribute("value",couleur);

    document.getElementById("placesVoiture").setAttribute("value",nbr_place);

    document.getElementById("lienImageVoiture").setAttribute("src",voiture_image);

    document.getElementById("idVoiture").setAttribute("value",idVoit);
}