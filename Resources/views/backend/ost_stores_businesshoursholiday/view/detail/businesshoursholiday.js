/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursholiday.view.detail.Businesshoursholiday', {
    extend: 'Shopware.model.Container',
    padding: 20,

    configure: function() {
        return {
            controller: 'OstStoresBusinesshoursholiday',
            fieldSets: [
                {
                    fields: {
                        active: 'Status',
                        key: 'Feiertag',
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

