/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresHoliday.model.Holiday', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'OstStoresHoliday',
            detail: 'Shopware.apps.OstStoresHoliday.view.detail.Holiday'
        };
    },

    fields: [
        { name: 'id', type: 'int', useNull: true },
        { name: 'active', type: 'boolean' },
        { name: 'name', type: 'string' }
    ],

});
