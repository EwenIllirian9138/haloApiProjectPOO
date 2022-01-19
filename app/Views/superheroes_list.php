<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('favicon.ico');?>"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>
</head>
<body>
<h1><?php echo $title; ?></h1>

<script>
    $(document).ready(function() {
        $('#SuperHeroesList').DataTable();
    } );
</script>


<table id="SuperHeroesList" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Image</th>
        <th>Nom</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($arrSuperHeroes as $row){ ?>
        <tr>
            <td><img src="<?php echo $row->ImageLink;?>" width="80"></td>
            <td><?php echo $row->Name;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
