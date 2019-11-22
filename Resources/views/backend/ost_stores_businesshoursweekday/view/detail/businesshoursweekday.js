/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursweekday.view.detail.Businesshoursweekday', {
    extend: 'Shopware.model.Container',
    padding: 20,

    configure: function() {
        return {
            controller: 'OstStoresBusinesshoursweekday',
            fieldSets: [
                {
                    fields: {
                        active: 'Status',
                        weekday: 'Wochentag (1 = Montag, 7 = Sonntag)',
                        startTimeString: 'Geöffnet',
                        endTimeString: 'Geschlossen',
                        storeId: 'Filiale'
                    },
                    title: undefined
                }
            ],
        };
    }
});

