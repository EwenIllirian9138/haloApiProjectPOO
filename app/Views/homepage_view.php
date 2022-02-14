<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
</head>
<body>
<h1>
    <?php echo $title; ?>
</h1>
<div><table><tr><td><a href="Homepage">Accueil</a></td><td><a href="SuperHeroesAPI">Liste des SuperHéros</a></td></tr></table></div>
<div style="section:flex; flex-direction: row;">
    <?php for($i = 0 ; $i<=2 ; $i++){ ?>
    <div>
        <div style="section:flex; flex-direction: row;"><img src="<?php echo $arrNewSuperHeroes[$i]->ImageLink; ?>"></div>
        <div style="section:flex, flex-directon:column;">
            <div style="section:flex; flex-direction: row;"><h3>Nom : <?php echo $arrNewSuperHeroes[$i]->Name; ?></h3></div>
            <div style="section:flex; flex-direction: row;">Alter-Ego : <?php echo $arrNewSuperHeroes[$i]->AlterEgo; ?></div>
            <div style="section:flex; flex-direction: row;">Alignement : <?php echo $arrNewSuperHeroes[$i]->Alignment; ?></div>
            <div style="section:flex; flex-direction: row;">Première apparition : <?php echo $arrNewSuperHeroes[$i]->FirstAppearance; ?></div>
        </div>
    </div>
    <?php } ?>
</div>
</body>
</html>