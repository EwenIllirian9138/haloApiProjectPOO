{extends file="content.tpl"}

{block name="content"}

{$form_open}

<div class="form-group row">
    <div class="col-sm-10">
    </div>
    <div class="col-sm-10">
        {$form_id}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        {$label_name}
    </div>
    <div class="col-sm-10">
        {$form_name}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        {$label_alterego}
    </div>
    <div class="col-sm-10">
        {$form_alterego}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        {$label_aliases}
    </div>
    <div class="col-sm-10">
        {$form_aliases}
</div>
    <div class="form-group row">
    <div class="col-sm-10">
        {$label_placeofbirth}
    </div>
    <div class="col-sm-10">
        {$form_placeofbirth}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        {$label_firstappearance}
    </div>
    <div class="col-sm-10">
        {$form_firstappearance}
    </div>
<div class="form-group row">
    <div class="col-sm-10">
        {$label_alignment}
    </div>
    <div class="col-sm-10">
        {$form_alignment}
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
