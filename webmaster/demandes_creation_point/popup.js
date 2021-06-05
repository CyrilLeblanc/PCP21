
function popupInfosPoint(nom,adresse,ville,latitude,longitude,image){
	
	document.getElementById("nomPoint").setAttribute("value",nom);

	document.getElementById("adressePoint").setAttribute("value",adresse);

	document.getElementById("villePoint").setAttribute("value",ville);

	document.getElementById("latitudePoint").setAttribute("value",latitude);

	document.getElementById("longitudePoint").setAttribute("value",longitude);

	document.getElementById("lienImage").setAttribute("src",image);
	document.getElementById("imagePoint").innerHTML = image;
}

function set_idPoint(id){
	// on change le contenu de la redirection des boutons accepté et refuser
	document.getElementById("Valider").setAttribute("href","?validate="+id);
	document.getElementById("Refuser").setAttribute("href","?delete="+id);
}