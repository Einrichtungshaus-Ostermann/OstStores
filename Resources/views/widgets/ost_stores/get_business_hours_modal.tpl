
{* set namespace *}
{namespace name="widgets/ost-stores/get-business-hours-modal"}


{assign var="store" value=$ostStore}


{assign var="weekday" value=[]}
{$weekday[1] = "Mo"}
{$weekday[2] = "Di"}
{$weekday[3] = "Mi"}
{$weekday[4] = "Do"}
{$weekday[5] = "Fr"}
{$weekday[6] = "Sa"}
{$weekday[7] = "So"}


<div>

    <div class="address">

        <p>
        <span class="title">{$store.name}</span>


        {$store.street}<br />
        {$store.zip} {$store.city}<br />
        Deutschland
        </p>
    </div>


    <div class="weekdays">

        <p>
        <span class="title">Öffnungszeiten</span>

            {if $store.businessHours != ""}

                {$store.businessHours}

            {else}

                {for $i = 1; $i <= 7; $i++}

                    {if isset($store.businesshoursWeekdaysByWeekday[$i])}

                        {$weekday[$i]}: {$store.businesshoursWeekdaysByWeekday[$i].startTime|date_format:'H:i'} - {$store.businesshoursWeekdaysByWeekday[$i].endTime|date_format:'H:i'} Uhr

                    {else}

                        {$weekday[$i]}: geschlossen

                    {/if}


                    <br />

                {/for}


            {/if}




        </p>
    </div>

    <div class="holidays">

        <p>
            <span class="title">Besondere Öffnungszeiten</span>
            <br />

        </p>





        {foreach $ostStoresOpen as $open}
            <div class="holiday">

                <p>

                <span class="name">
                {$open.description} ({$open.date|date_format:"%d.%m.%Y"})
                    </span>


                    {$open.startTime|substr:0:5} - {$open.endTime|substr:0:5} Uhr

                </p>

            </div>
        {/foreach}


            {foreach $ostStoresHolidays as $key => $holiday}


                {if $holiday.active == false}
                    {continue}
                    {/if}



        <div class="holiday">

            <p>

                <span class="name">
                {$holiday.name} ({$holiday.date|date_format:"%d.%m.%Y"})
                    </span>


                {if isset($store.businesshoursHolidaysByHoliday[$key])}

                    {$store.businesshoursHolidaysByHoliday[$key].startTime|date_format:'H:i'} - {$store.businesshoursHolidaysByHoliday[$key].endTime|date_format:'H:i'} Uhr

                {else}

                    geschlossen

                {/if}


            </p>

        </div>

            {/foreach}



    </div>
</div>