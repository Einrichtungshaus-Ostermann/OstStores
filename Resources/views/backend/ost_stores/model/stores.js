
Ext.define('Shopware.apps.OstStores.model.Stores', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'OstStores',
            detail: 'Shopware.apps.OstStores.view.detail.Stores'
        };
    },

    fields: [
        { name: 'id', type: 'int', useNull: true },
        { name: 'active', type: 'boolean' },
        { name: 'name', type: 'string' },
        { name: 'street', type: 'string' },
        { name: 'zip', type: 'string' },
        { name: 'city', type: 'string' },
        { name: 'countryId', type: 'integer' },
        { name: 'phone', type: 'string' },
        { name: 'fax', type: 'string' },
        { name: 'email', type: 'string' },
        { name: 'url', type: 'string' },
        { name: 'latitude', type: 'string' },
        { name: 'longitude', type: 'string' },
        { name: 'position', type: 'integer' },
        { name: 'key', type: 'string' },
        { name: 'physical', type: 'boolean' },
        { name: 'pickup', type: 'boolean' },
        { name: 'attributeStock', type: 'string' },
        { name: 'attributeExhibition', type: 'string' },
        { name: 'businessHours', type: 'string' }
    ],

});
