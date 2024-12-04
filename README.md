# Projet

Les Dates en PHP & Redirection après traitement - Les rudiments du langage PHP

## Description du projet

Dans ce support vous allez réaliser une série d'exercices qui vous permettront de monter en compétences sur le langage PHP.
    1 - Vous apprendrez a travailler avec les dates en PHP.
    2 - Vous apprendrez à gérer une redirection après un traitement.

### _Question 1_

La validation d'un champ particulier contenant une date demande un peu de travail. Le format d'une date évolue peu mais le besoin, lui, est constant. Nous prévoyons ici un programme de vérification qui pourra être utilisé dans différentes applications PHP.

Créez une page PHP auto-référente contenant un formulaire, un champ de type texte (« jour »), et un bouton pour soumettre la requête.

Définissez une fonction PHP, verifier($d), qui sera chargée de vérifier le champ dont le nom est passé en paramètre.

Commencez par afficher la valeur du champ correspondant : un simple echo suffira.

Concevez un masque d'expression régulière pour vérifier le format jj/mm/aaaa.

Modifiez la fonction verifier() pour qu'elle renvoie un message d'erreur lorsque le champ ne valide pas le masque.

Ajoutez à votre code une vérification de la date, en fait il faut contrôler cette fois si elle correspond bien à une date effective.

### _Question 2_

Lorsqu'une page PHP valide les données d'un formulaire, elle doit généralement afficher un message à l'utilisateur.

Ce message peut faire partie de la page PHP qui a assuré le traitement mais aussi être intégré à une autre page. Généralement, les formulaires exposés par une page form1.php postent les données sur eux-mêmes, ce qui simplifie l'établissement d'un rapport d'erreurs de saisie.

Il faut par conséquent aider le programmeur à se diriger vers une autre page.

Nous allons, au travers de cet exercice, mettre en place une logique pour traiter un formulaire et pour activer les différentes pages qui composent l'application à laquelle appartient le formulaire.

![schéma](image.png)

1 - Créez une page form1.php

Placez dans cette page un formulaire auto-référant, deux champs email et password, ainsi qu'un bouton de validation de type submit.

2 - Déterminez si la page est publiée initialement ou s'il s'agit d'un formulaire qui revient (post back) suite à l'action sur le bouton submit. Utilisez pour cela une variable $msg qui affichera « Saisie obligatoire » lors de la première publication de la page.

3 - Dans le second cas, vérifiez que les champs email et password sont bien renseignés et qu'ils correspondent à des couples de valeurs prises dans le tableau qui suit :

| email | password|
|:------: | :-------:|
| [jean_valjean@academie.net](jean_valjean@academie.net) | hugo |
| [steve_ostin@lesseries.org](steve_ostin@lesseries.org) | 3md |
| [david_banner@marvel.com](david_banner@marvel.com) | hulk |

Utilisez une variable $erreur positionnées à true ou false. Procédez à un rapport d'erreur en cas d'échec.

4 - Si l'identification a réussi, redirigez l'utilisateur vers form2.php qui vérifie la présence d'un cookie généré par form1.php.

5 - form2.php affiche un message de bienvenue.
