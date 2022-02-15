{extends file="content.tpl"}

{block name="title" append}Halo{/block}

{block name="script_list"}
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
{/block}

{block name="content"}
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
            {foreach from=$arrSuperHeroes item=arr}
            <tr>
                <td><img src="{$arr->ImageLink}" width="80"></td>
                <td>{$arr->Name}</td>
                <td>{$arr->AlterEgo}</td>
                <td>{$arr->Aliases}</td>
                <td>{$arr->ImageLink}</td>
                <td>{$arr->PlaceOfBirth}</td>
                <td>{$arr->FirstAppearance}</td>
                <td>{$arr->Alignment}</td>
                <td>{$arr->IdSuperHero}</td>
                <td></td>
            </tr>
            {/foreach}
            </tbody>
        </table>
    </div >

    <div style="margin-left : 55%; padding-left: 0px; position : fixed; margin-top: 45px";>
        <h1  id="NomTitle">Sélectionnez un Super-Héros</h1>
        <img id='ImageHero' src="" width="200"> <br />
        <label>Nom : </label> <label id="NomLabel"></label> <br />
        <label>Alter ego : </label> <label id="AlterEgoLabel"></label> <br />
        <label>Aliases : </label> <label id="AliasesLabel"></label> <br />
        <label>Lieu de naissance : </label> <label id="PlaceOfBirthLabel"></label> <br />
        <label>Première apparition : </label> <label id="FirstAppearanceLabel"></label> <br />
        <label>Alignement : </label> <label id="AlignmentLabel"></label> <br /><br />

        <form method="POST" action="/EditController/goToForm">
            <input type="number" value="test" id="IdHero" name="id" hidden>
            <input type="submit" id='EditButton' value="Modifier" disabled>
        </form>

        <form method="POST" action="/SuperHeroesListController/deleteHero">
            <input type="number" value="test" id="IdHero" name="id" hidden>
            <input type="submit" id='EditButton' value="Supprimer" disabled>
        </form>

    </div>
    <div style="clear:both;"></div>
</div>


{/block}
