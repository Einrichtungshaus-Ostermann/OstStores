/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursholiday.model.Businesshoursholiday', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'OstStoresBusinesshoursholiday',
            detail: 'Shopware.apps.OstStoresBusinesshoursholiday.view.detail.Businesshoursholiday'
        };
    },

    fields: [
        { name: 'id', type: 'int', useNull: true },
        { name: 'active', type: 'boolean' },
        { name: 'key', type: 'string' },
        { name: 'keyName', type: 'string' },
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
