
{if $stockWarning == true}
    {include file="frontend/_includes/messages.tpl" type="error" content="Die Filiale hat leider nicht alle Artikel ab Lager verfügbar.<br />Bitte wählen Sie eine andere Filiale!"}
{/if}

<div class="store{if $stockWarning == true} has--stock-warning{/if}" data-id="{$store.id}">
    <span class="title">{$store.name}</span>
    <div class="block-group">
        <div class="block details">
            <p>
                <span class="sub-title">Anschrift</span>
                {$store.street}<br />
                {$store.zip} {$store.city}<br />
                Deutschland
            </p>
            <p>
                <span class="sub-title">Kontakt</span>
                Telefon: {$store.phone}<br />
                Fax: {$store.fax}<br />
                {$store.email}<br />
                <a href="{$store.url}" target="_blank">{$store.url}</a>
            </p>

            {if $showSelectionButton == true}
                <p>
                    <span class="btn is--primary">Abholort wählen</span>
                </p>
            {/if}

        </div>
        <div class="block business-hours">
            {*
            <p>
                <span class="sub-title">Öffnungszeiten</span>
                {if $store.businessHours != ""}
                    {$store.businessHours}
                {else}
                    Wir haben vorerst bis zum 19.04.2020 geschlossen.
                {/if}
            </p>
            *}
            <p>
                <span class="sub-title">Öffnungszeiten</span>
                {if $store.businessHours != ""}
                    {$store.businessHours}
                {else}
                    Mo - Sa: {$store.businesshoursWeekdays[0].startTime|date_format:'H:i'} - {$store.businesshoursWeekdays[0].endTime|date_format:'H:i'} Uhr<br />
                    Sonntag: geschlossen
                {/if}
            </p>
            <span class="business-hours--modal"
                  data-id="{$store.id}"
                  data-url="{url module="widgets" controller="OstStores" action="getBusinessHoursModal"}"
                  data-title="{"{s name="business-hours-modal-title"}Öffnungszeiten, Feiertage und Sonderzeiten{/s}"|escape}"
                  data-ost-store-business-hours-modal-button="true"
            >
                Alle Feiertage und Sonderzeiten anzeigen
            </span>
        </div>
    </div>
</div>
