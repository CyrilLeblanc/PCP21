
function popupModifPoint(nom,adresse,ville,latitude,longitude,image, id){
	
	document.getElementById("nomPoint").setAttribute("value",nom);

	document.getElementById("adressePoint").setAttribute("value",adresse);

	document.getElementById("villePoint").setAttribute("value",ville);

	document.getElementById("latitudePoint").setAttribute("value",latitude);

	document.getElementById("longitudePoint").setAttribute("value",longitude);

	document.getElementById("idPoint").setAttribute("value",id);
}