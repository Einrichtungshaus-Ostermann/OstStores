
{* set namespace *}
{namespace name="widgets/ost-stores/get-pickup-store-selection"}

{foreach $ostStores as $store}
    {include file="frontend/ost-stores/store.tpl" store=$store stockWarning=!$store.isValid showSelectionButton=true}
{/foreach}
