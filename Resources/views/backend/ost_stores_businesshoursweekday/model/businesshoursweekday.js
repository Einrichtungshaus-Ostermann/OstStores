/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursweekday.model.Businesshoursweekday', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'OstStoresBusinesshoursweekday',
            detail: 'Shopware.apps.OstStoresBusinesshoursweekday.view.detail.Businesshoursweekday'
        };
    },

    fields: [
        { name: 'id', type: 'int', useNull: true },
        { name: 'active', type: 'boolean' },
        { name: 'weekday', type: 'int' },
        { name: 'weekdayName', type: 'string' },
        { name: 'startTimeString', type: 'string' },
        { name: 'endTimeString', type: 'string' },
        { name: 'storeId', type: 'int' },
        { name: 'storeName', type: 'string' },
    ],

    associations: [{
        relation: 'ManyToOne',
        field: 'storeId',
        type: 'hasMany',
        model: 'Shopware.apps.OstStoresStore.model.Store',
        name: 'getStore',
        associationKey: 'store'
    }]

});
