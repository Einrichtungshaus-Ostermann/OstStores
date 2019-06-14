//

Ext.define('Shopware.apps.OstStores.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.stores-list-window',
    height: 450,
    title : 'Filialen',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.OstStores.view.list.Stores',
            listingStore: 'Shopware.apps.OstStores.store.Stores'
        };
    }
});