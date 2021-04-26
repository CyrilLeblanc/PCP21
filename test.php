<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" language="javascript">
    function activer( elem, statut ){
    var mon_bouton = document.forms.formulaire.bouton;
 
        if (mon_bouton.value=='Activer') {
            elem.disabled = statut;
            mon_bouton.value = 'Desactiver'
        } else {
            elem.disabled = !statut;
            mon_bouton.value ='Activer'
        }
     
    }
</script>
</head>
<body>
 
<form name="formulaire" method="post" action="#">
    <label for="champ">Texte : </label><input type="text" disabled="true" name="champ">
    <input type="button"  name="bouton" value="Activer" onclick="activer(document.forms.formulaire.champ, false);">
</form>
 
     
</body>
</html>