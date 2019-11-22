/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursweekday.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.businesshoursweekday-list-window',
    height: 450,
    title : 'Filialen',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.OstStoresBusinesshoursweekday.view.list.Businesshoursweekday',
            listingStore: 'Shopware.apps.OstStoresBusinesshoursweekday.store.Businesshoursweekdays'
        };
    }
});