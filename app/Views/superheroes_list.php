<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('favicon.ico');?>"/>
</head>
<body>
<h1><?php echo $title; ?></h1>

<p><a href="<?php echo previous_url();?>">Retour</a></p>
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Alignement</th>
        <th>Alias</th>
        <th>Lieu de naissance</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($arrSuperHeroes as $row){ ?>
        <tr>
            <td><?php echo $row->Name;?></td>
            <td><?php echo $row->Alignment;?></td>
            <td><?php echo $row->Aliases = $row->Aliases == null ? " RAS////// " : $row->Aliases;?></td>
            <td><?php echo $row->PlaceOfBirth = $row->PlaceOfBirth == null ? "RAS/////" : $row->PlaceOfBirth;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
