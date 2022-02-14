{extends file="content.tpl"}

{block name="title" append}Halo{/block}

{block name="content"}
    <h1>
         {$title}
    </h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nom du héro</th>
            <th scope="col">Son alter-ego</th>
            <th scope="col">Alignement</th>
            <th scope="col">première apparition</th>
            <th scope="col">représenation</th>
        </tr>
        </thead>
        <tbody>
        {for $i=1 to 3}
        <tr class="table-light">
            <th scope="row">{$arrNewSuperHeroes[$i]->Name}</th>
            <td> {$arrNewSuperHeroes[$i]->AlterEgo}</td>
            <td> {$arrNewSuperHeroes[$i]->Alignment}</td>
            <td> {$arrNewSuperHeroes[$i]->FirstAppearance}</td>
            <td><img  class="img-thumbnail" src="{$arrNewSuperHeroes[$i]->ImageLink}" width="80"></td>
        </tr>
         {/for}
        </tbody>
    </table>
{/block}



