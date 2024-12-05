<?php
    $msg = "";
//2 - Déterminez si la page est publiée initialement ou s'il s'agit d'un formulaire qui revient (post back) suite à l'action sur le bouton submit. Utilisez pour cela une variable $msg qui affichera « Saisie obligatoire » lors de la première publication de la page.
// Vérifier que tout les champs du formulaire sont remplis, sinon $msg qui affichera « Saisie obligatoire »
    if (!isset($_POST["valider"])){
        //Afficher « Saisie obligatoire » lors de la première publication de la page
        $msg = $msg . " Saisie obligatoire";
        $erreur = true;
    }else{
        $msg = "";
        if(empty($_POST["email"])){
            $msg = $msg . "Saisie obligatoire de l'email";
            $erreur = true;
        }
        if(empty($_POST["password"])){
            $msg = $msg . "Saisie obligatoire du mot de passe";
            $erreur = true;
        }
//3 - Dans le second cas, vérifiez que les champs email et password sont bien renseignés et qu'ils correspondent à des couples de valeurs prises dans le tableau qui suit :
// Tableau avec mail et password.
        $logins = array(
            "jean_valjean@academie.net" => "hugo",
            "steve_ostin@lesseries.org" => "3md",
            "david_banner@marvel.com" => "hulk"
        );
// Vérifier si les champs remplit sont corrects.
//Utilisez une variable $erreur positionnées à true ou false. Procédez à un rapport d'erreur en cas d'échec.

        if (!empty($_POST["email"])&&!empty($_POST["password"])){
            if(array_key_exists($_POST["email"], $logins)){
                if ($logins[$_POST["email"]] != $_POST["password"]){
                    $msg = $msg . "Vérifiez votre adresse e-mail et/ou votre mot de passe";
                    $erreur = true;
                }
            } else{
                $msg = $msg . "Votre adresse e-mail est incorrect.";
                $erreur = true;
            }
        }
    }
//4 - Si l'identification a réussi, redirigez l'utilisateur vers form2.php qui vérifie la présence d'un cookie généré par form1.php.
    if(!$erreur){
        //Création cookie
        setcookie("email", $_POST["email"]);
        //Redirection
        header('Location: form2.php');
    }
?>
<!-- Créez une page form1.php
Placez dans cette page un formulaire auto-référant, deux champs email et password,
ainsi qu'un bouton de validation de type submit. -->
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Redirection après Traitement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="./style.css"/>
    </head>
    <body>
        <h1>Identifiez-vous</h1>
            <form method="post" action="form1.php">
                <input type="text" name="email" placeholder="Email" autocomplete="email">
                <input type="password" name="password" value="" placeholder="Mot de passe" autocomplete= "current-password">
                <div class="boutons">
                    <input type="submit" name="valider" value="Valider">
                    <input type="reset" id="reset" name="reset" value="Annuler">
                </div>
            </form>
            <!--  Déterminez si la page est publiée initialement ou s'il s'agit d'un formulaire qui
            revient (post back) suite à l'action sur le bouton submit. Utilisez pour cela une variable
            $msg qui affichera « Saisie obligatoire »-->
            <p class="message"><?php echo $msg ; ?></p>
    </body>
</html>
