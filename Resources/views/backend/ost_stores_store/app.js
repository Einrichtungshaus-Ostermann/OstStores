/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresStore', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.OstStoresStore',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.Store',

        'detail.Store',
        'detail.Window'
    ],

    models: [ 'Store' ],
    stores: [ 'Stores' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});