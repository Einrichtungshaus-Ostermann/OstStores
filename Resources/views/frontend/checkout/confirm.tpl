
{* file to extend *}
{extends file="parent:frontend/checkout/confirm.tpl"}

{* set namespace *}
{namespace name="frontend/ost-stores/checkout/confirm"}





{* add pickup-store class to body tag *}
{block name="frontend_index_body_classes"}{$smarty.block.parent} {strip}
    {if $ostStoresPickupStatus == true}
        has--pickup-store
    {/if}
{/strip}{/block}

{* dont ever allow different billing address and shipping address to show only the billing address*}
{block name='frontend_checkout_confirm_information_addresses'}
    {if $ostStoresPickupStatus == true}
        {$activeBillingAddressId = $activeShippingAddressId}
    {/if}
    {$smarty.block.parent}
{/block}

{* change the title to "billing address" only *}
{block name='frontend_checkout_confirm_information_addresses_equal_panel_title'}
    {if $ostStoresPickupStatus == true}
        <div class="panel--title is--underline">
            {s name='confirm-address-title'}Rechnungsadresse{/s}
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}

{* remove shipping panel from within billing panel *}
{block name='frontend_checkout_confirm_information_addresses_equal_panel_shipping'}
    {if $ostStoresPickupStatus == true}
    {else}
        {$smarty.block.parent}
    {/if}
{/block}






{* ... *}
{block name='frontend_checkout_confirm_product_table'}

    {if $ostStoresPickupStatus == true}

        <div class="ost-stores--pickup-store-selection panel has--border">
            <div class="panel--title primary is--underline">
                Click & Collect Filiale
            </div>
            <div class="panel--body is--wide">

                {if $ostStoresPickupValidStore == true}

                    {include file="frontend/ost-stores/store.tpl" store=$ostStoresPickupStore}

                    <button class="btn is--secondary"
                            data-url="{url module="widgets" controller="OstStores" action="getPickupStoreSelectionModal"}"
                            data-changestoreurl="{url module="frontend" controller="OstStores" action="setPickupStoreSelection" store=__store__}"
                            data-title="{"{s name="pickup-store-selection-modal-title"}Bitte wählen Sie Ihre Filiale{/s}"|escape}"
                            data-ost-stores-pickup-store-selection-button="true" >
                        Filiale wechseln
                    </button>

                {else}

                    Die bisher gewählte Filiale ist leider ungültig.<br />
                    Bitte wählen Sie ein gültige Filiale.

                    <button class="btn is--secondary"
                            data-url="{url module="widgets" controller="OstStores" action="getPickupStoreSelectionModal"}"
                            data-changestoreurl="{url module="frontend" controller="OstStores" action="setPickupStoreSelection" store=__store__}"
                            data-title="{"{s name="pickup-store-selection-modal-title"}Bitte wählen Sie Ihre Filiale{/s}"|escape}"
                            data-ost-stores-pickup-store-selection-button="true" >
                        Filiale wechseln
                    </button>

                    {$invalidShippingAddress = true}

                {/if}

            </div>
        </div>

    {/if}

    {* parent *}
    {$smarty.block.parent}

{/block}


