<!-- Créez une page PHP auto-référente contenant un formulaire, un champ de type texte (« jour »), et un bouton pour soumettre la requête. -->
<!-- On parle de page auto-référente lorsque le script PHP comporte un formulaire qui se soumet à lui-même. On définira l'attribut HTML action de la balise form  : action="<?php echo $_SERVER["SCRIPT_NAME"] ?>" -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Validation Date</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class='MonTableau'>
		<h2>Validation de la date</h2>
		<form method="post" action="<?php echo $_SERVER["SCRIPT_NAME"] ?>">
			<label for="jour">Entrez une date :</label>
            <input type="text" name="jour" placeholder="jj/mm/aaaa">
			<input class="btn btn-sample" type="submit" name="bouton" value="Soumettre">
            <!-- 3 - Afficher la valeur du champ correspondant : un simple echo suffira. -->
            <?php $message = "";
            if ( !empty($_POST['bouton']))
            {
                verifier("jour");
            }
            ?>
            <!-- 3 - Afficher la valeur du champ correspondant : un simple echo suffira. -->
			<div><?php echo $message; ?></div>
		</form>
	</div>
</body>
</html>

<?php
// Définissez une fonction PHP, verifier($d), qui sera chargée de vérifier le champ dont le nom est passé en paramètre.
function verifier($d){
    //Mettre la variable en global car elle est utilisée dans le formulaire HTML
    global $message;

    $recuperationMsg  = $_POST[$d];
    $message = $message . "<p>La date que vous avez saisie est $recuperationMsg .</p>";
    // 4 - Concevez un masque d'expression régulière pour vérifier le format jj/mm/aaaa.

    $masque = "'^\d{1,2}/\d{1,2}/\d{4}$'";

    // 5 - Modifiez la fonction verifier() pour qu'elle renvoie un message d 'erreur lorsque le champ ne valide pas le masque.

    $verification = preg_match($masque, $recuperationMsg );
    
    if ($verification   == 0)
    {
        $message = $message . "<p>Le format de la date n'est pas valide !!!</p>";
    }else{
        $message = $message . "<p>Le format de la date est valide !!!</p>";
    // 6 - Ajoutez à votre code une vérification de la date, en fait il faut contrôler cette fois si elle correspond bien à une date effective.
		list($jour,$mois,$annee)=explode("/", $recuperationMsg);

		if(checkdate($mois,$jour,$annee))  // La fonction checkdate() de PHP vérifie si le mois, le jour et l'année correspondent.
			{$message = $message . "<p>La date est correct ! </p>";}
		else
			{$message = $message . "<p>La date est incorrect !</p> ";}
	}
	return $message;
}
?>