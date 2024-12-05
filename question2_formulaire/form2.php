<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>Bienvenue</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>
    <?php
        if(empty($_COOKIE["email"])){
            echo "<h2>Vous devez vous identifier</h2>";
        }else{
            print "<h2>Boujou " . htmlspecialchars($_COOKIE["email"]) . "</h2>";
        }
    ?>
</body>
</html>
