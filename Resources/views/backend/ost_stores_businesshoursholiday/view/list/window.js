/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursholiday.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.businesshoursholiday-list-window',
    height: 450,
    title : 'Filialen',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.OstStoresBusinesshoursholiday.view.list.Businesshoursholiday',
            listingStore: 'Shopware.apps.OstStoresBusinesshoursholiday.store.Businesshoursholidays'
        };
    }
});