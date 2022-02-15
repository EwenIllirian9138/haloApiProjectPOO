{extends file="content.tpl"}

{block name="content"}

    {$form_open}
    <div class="form-group row">
        <div class="col-sm-10">
        {$label_email}
        </div>
        <div class="col-sm-10">
            {$form_email}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
        {$label_password}
        </div>
        <div class="col-sm-10">
        {$form_password}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
        {$form_submit}
        </div>
    </div>
    {$form_close}

    {if (count($arrErrors) > 0)}
        <div>
            {foreach from = $arrErrors item = strError}
                <p>{$strError}</p>
            {/foreach}
        </div>
    {/if}

{/block}