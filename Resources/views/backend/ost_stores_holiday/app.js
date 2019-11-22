/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresHoliday', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.OstStoresHoliday',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.Holiday',

        'detail.Holiday',
        'detail.Window'
    ],

    models: [ 'Holiday' ],
    stores: [ 'Holidays' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});