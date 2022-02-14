{extends file="content.tpl"}

{block name="content"}

    {$form_open}
    {$label_email}
    {$form_email}
    {$label_password}
    {$form_password}
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