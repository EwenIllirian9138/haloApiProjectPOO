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
<p><a href="<?php echo site_url('product/add/');?>">Ajouter un produit</a></p>
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($arrProducts as $row){ ?>
        <tr>
            <td><?php echo $row->product_name;?></td>
            <td><?php echo $row->product_price;?></td>
            <td><a href="<?php echo site_url('product/edit/'.$row->product_id);?>">Modifier</a>
                <a href="<?php echo site_url('product/delete/'.$row->product_id);?>">Supprimer</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>