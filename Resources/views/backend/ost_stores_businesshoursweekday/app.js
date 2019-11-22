/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursweekday', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.OstStoresBusinesshoursweekday',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.Businesshoursweekday',

        'detail.Businesshoursweekday',
        'detail.Window'
    ],

    models: [ 'Businesshoursweekday' ],
    stores: [ 'Businesshoursweekdays' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});