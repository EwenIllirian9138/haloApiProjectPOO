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
    <script type="text/javascript" src="./Libraries/jquery.js"></script>
</head>
<body>
<h1><?php echo $title; ?></h1>

<script>
    $(document).ready(function() {
        var table = $('#SuperHeroesList').DataTable( {
            "lengthChange": false,
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "defaultContent": "<button width=20>+</button>"
            },
            {
                "targets": [ 2 ],
                "visible": false
            },
            {
                "targets": [ 3 ],
                "visible": false
            },
            {
                "targets": [ 4 ],
                "visible": false
            },
            {
                "targets": [ 5 ],
                "visible": false
            },
            {
                "targets": [ 6 ],
                "visible": false
            },
            {
                "targets": [ 7 ],
                "visible": false
            },
            {
                "targets": [ 8 ],
                "visible": false
            },
            {
                "targets": [ 9 ],
                "orderable": false
            }
            ]
        } );

        $('#SuperHeroesList tbody').on( 'click', 'button', function () {
            var data = table.row( $(this).parents('tr') ).data();
            $('#NomLabel').text(data[1])
            $('#NomTitle').text(data[1])
            $('#AlterEgoLabel').text(data[2])
            $('#AliasesLabel').text(data[3])
            $('#ImageHero').attr('src', data[4])
            $('#PlaceOfBirthLabel').text(data[5])
            $('#FirstAppearanceLabel').text(data[6])
            $('#AlignmentLabel').text(data[7])
            $('#IdHero').val(data[8])
            $('#EditButton').prop('disabled', false)
        } );
    } );
</script>

<div>
    <div style="float:left; width: 50%; padding: 20px">
        <table id="SuperHeroesList" class="display" style="width:100%;">
            <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>AlterEgo</th>
                <th>Aliases</th>
                <th>ImageLink</th>
                <th>PlaceOfBirth</th>
                <th>FirstAppearance</th>
                <th>Alignment</th>
                <th>IdSuperHero</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($arrSuperHeroes as $row){ ?>
                <tr>
                    <td><img src="<?php echo $row->ImageLink;?>" width="80"></td>
                    <td><?php echo $row->Name;?></td>
                    <td><?php echo $row->AlterEgo;?></td>
                    <td><?php echo $row->Aliases;?></td>
                    <td><?php echo $row->ImageLink;?></td>
                    <td><?php echo $row->PlaceOfBirth;?></td>
                    <td><?php echo $row->FirstAppearance;?></td>
                    <td><?php echo $row->Alignment;?></td>
                    <td><?php echo $row->IdSuperHero;?></td>
                    <td></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div >

    <div style="margin-left : 55%; padding-left: 0px; position : fixed">
        <h1  id="NomTitle">Sélectionnez un Super-Héros</h1>
        <img id='ImageHero' src="" width="200"> <br />
        <label>Nom : </label> <label id="NomLabel"></label> <br />
        <label>Alter ego : </label> <label id="AlterEgoLabel"></label> <br />
        <label>Aliases : </label> <label id="AliasesLabel"></label> <br />
        <label>Lieu de naissance : </label> <label id="PlaceOfBirthLabel"></label> <br />
        <label>Première apparition : </label> <label id="FirstAppearanceLabel"></label> <br />
        <label>Alignement : </label> <label id="AlignmentLabel"></label> <br /><br />

        <form method="POST" action="EditController/goToForm">
            <input type="number" value="test" id="IdHero" name="id" hidden>
            <input type="submit" id='EditButton' value="Modifier" disabled>
        </form>

    </div>
</div>
</body>
</html>

