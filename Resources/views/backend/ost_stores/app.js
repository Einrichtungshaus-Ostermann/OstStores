
Ext.define('Shopware.apps.OstStores', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.OstStores',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.Stores',

        'detail.Stores',
        'detail.Window'
    ],

    models: [ 'Stores' ],
    stores: [ 'Stores' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});