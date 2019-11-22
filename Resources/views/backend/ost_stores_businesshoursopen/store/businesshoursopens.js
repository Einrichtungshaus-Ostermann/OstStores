/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursopen.store.Businesshoursopens', {
    extend:'Shopware.store.Listing',
    pageSize: 100,

    configure: function() {
        return {
            controller: 'OstStoresBusinesshoursopen'
        };
    },

    model: 'Shopware.apps.OstStoresBusinesshoursopen.model.Businesshoursopen'
});