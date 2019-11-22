/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresHoliday.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.holiday-list-window',
    height: 450,
    title : 'Filialen',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.OstStoresHoliday.view.list.Holiday',
            listingStore: 'Shopware.apps.OstStoresHoliday.store.Holidays'
        };
    }
});