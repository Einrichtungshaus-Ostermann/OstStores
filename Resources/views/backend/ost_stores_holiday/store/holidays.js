/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresHoliday.store.Holidays', {
    extend:'Shopware.store.Listing',
    pageSize: 100,

    configure: function() {
        return {
            controller: 'OstStoresHoliday'
        };
    },

    model: 'Shopware.apps.OstStoresHoliday.model.Holiday'
});