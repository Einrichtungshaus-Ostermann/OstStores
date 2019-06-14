//

Ext.define('Shopware.apps.OstStores.store.Stores', {
    extend:'Shopware.store.Listing',

    configure: function() {
        return {
            controller: 'OstStores'
        };
    },

    model: 'Shopware.apps.OstStores.model.Stores'
});