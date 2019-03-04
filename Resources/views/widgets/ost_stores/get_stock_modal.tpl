
{* set namespace *}
{namespace name="widgets/ost-stores/get-stock-modal"}


<table class="">


    <thead>


    <tr>
        <td class="store">{s name="store-title"}Verkaufshaus{/s}</td>
        <td class="exhibit">{s name="store-exhibit"}In Ausstellung{/s}</td>
        <td class="stock">{s name="store-stock"}Lagerbestand{/s}</td>
    </tr>




    </thead>


    <tbody>

    {foreach $ostStoresStock as $stock}


        <tr>
            <td class="store">
                <span class="name">{$stock.store.name}</span>
                {$stock.store.street}<br />
                {$stock.store.zip} {$stock.store.city}
            </td>
            <td class="exhibit">
                <li class="icon--cd{if $stock.exhibit == true} in--exhibit{/if}"></li>
            </td>
            <td class="stock">
                {$stock.stock} {s name="stock-"}Stück{/s}
            </td>
        </tr>



    {/foreach}



    </tbody>


</table>