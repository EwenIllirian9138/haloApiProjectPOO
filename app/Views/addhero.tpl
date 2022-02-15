{extends file="content.tpl"}

{block name="content"}

    {$form_open}
    {$label_name}
    {$form_name}
    {$label_alterego}
    {$form_alterego}
    {$label_aliases}
    {$form_aliases}
    {$label_placeofbirth}
    {$form_placeofbirth}
    {$label_firstappearance}
    {$form_firstappearance}
    {$label_alignment}
    {$form_alignment}
    {$label_imagelink}
    {$form_imagelink}
    {$form_submit}
    {$form_close}

    {if (count($arrErrors) > 0)}
        <div>
            {foreach from = $arrErrors item = strError}
                <p>{$strError}</p>
            {/foreach}
        </div>
    {/if}

{/block}