/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursopen.model.Businesshoursopen', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'OstStoresBusinesshoursopen',
            detail: 'Shopware.apps.OstStoresBusinesshoursopen.view.detail.Businesshoursopen'
        };
    },

    fields: [
        { name: 'id', type: 'int', useNull: true },
        { name: 'active', type: 'boolean' },
        { name: 'description', type: 'string' },
        { name: 'date', type: 'date' },
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
