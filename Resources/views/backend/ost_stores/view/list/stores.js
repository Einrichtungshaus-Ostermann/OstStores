//

Ext.define('Shopware.apps.OstStores.view.list.Stores', {
    extend: 'Shopware.grid.Panel',
    alias:  'widget.stores-listing-grid',
    region: 'center',

    configure: function() {
        return {
            detailWindow: 'Shopware.apps.OstStores.view.detail.Window',
            columns: {
                id: { header: 'ID', width: 60 },
                name: { header: 'Name', flex: 1 }
            }
        };
    }
});
