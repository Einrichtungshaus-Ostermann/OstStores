/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresHoliday.view.list.Holiday', {
    extend: 'Shopware.grid.Panel',
    alias:  'widget.holiday-listing-grid',
    region: 'center',

    configure: function() {
        return {
            detailWindow: 'Shopware.apps.OstStoresHoliday.view.detail.Window',
            columns: {
                id: { header: '#', width: 60 },
                name: { header: 'Name', flex: 1 },
                active: { header: 'Aktiv', width: 60 }
            },
            showIdColumn: true
        };
    }
});
