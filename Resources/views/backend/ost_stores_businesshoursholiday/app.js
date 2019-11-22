/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursholiday', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.OstStoresBusinesshoursholiday',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.Businesshoursholiday',

        'detail.Businesshoursholiday',
        'detail.Window'
    ],

    models: [ 'Businesshoursholiday' ],
    stores: [ 'Businesshoursholidays' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});