/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursopen.view.detail.Businesshoursopen', {
    extend: 'Shopware.model.Container',
    padding: 20,

    configure: function() {
        return {
            controller: 'OstStoresBusinesshoursopen',
            fieldSets: [
                {
                    fields: {
                        active: 'Status',
                        description: 'Name',
                        date: { fieldLabel: "Datum", xtype: "datefield", format: 'Y-m-d' },
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

