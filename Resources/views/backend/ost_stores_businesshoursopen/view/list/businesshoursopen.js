/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursopen.view.list.Businesshoursopen', {
    extend: 'Shopware.grid.Panel',
    alias:  'widget.businesshoursopen-listing-grid',
    region: 'center',

    configure: function() {
        return {
            detailWindow: 'Shopware.apps.OstStoresBusinesshoursopen.view.detail.Window',
            columns: {
                id: { header: '#', width: 60 },
                storeName: { header: 'Filiale', flex: 1 },
                description: { header: 'Name', flex: 1 },
                date: { header: 'Datum', width: 100 },
                startTimeString: { header: 'Geöffnet', width: 100, renderer: this.renderTime },
                endTimeString: { header: 'Geschlossen', width: 100, renderer: this.renderTime },
                active: { header: 'Aktiv', width: 60 }
            },
            showIdColumn: true
        };
    },

    renderTime: function(value, metaData, record) {
        return value + ' Uhr';
    }
});
