/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresStore.view.list.Store', {
    extend: 'Shopware.grid.Panel',
    alias:  'widget.store-listing-grid',
    region: 'center',

    configure: function() {
        return {
            detailWindow: 'Shopware.apps.OstStoresStore.view.detail.Window',
            columns: {
                id: { header: '#', width: 60 },
                name: { header: 'Name', flex: 1 }
            },
            showIdColumn: true
        };
    }
});
