
{* file to extend *}
{extends file="parent:frontend/detail/buy.tpl"}

{* set namespace *}
{namespace name="frontend/ost-stores/detail/buy"}



{* add our button *}
{block name='frontend_detail_buy'}

    {* parent *}
    {$smarty.block.parent}

    {* button for modal widget *}
    <button class="ost-stores--stock-button btn is--center is--large" data-ost-store-stock-modal-button="true" data-number="{$sArticle.ordernumber}" data-url="{url module="widgets" controller="OstStores" action="getStockModal"}" data-title="{"{s name="stock-modal-title"}In Ihrem Centrum verfügbar?{/s}"|escape}" name="{"{s name="stock-modal-button"}In Ihrem Centrum verfügbar?{/s}"|escape}">
        {s name="stock-modal-button"}In Ihrem Centrum verfügbar?{/s}
    </button>

{/block}
