/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresStore.store.Stores', {
    extend:'Shopware.store.Listing',

    configure: function() {
        return {
            controller: 'OstStoresStore'
        };
    },

    model: 'Shopware.apps.OstStoresStore.model.Store'
});