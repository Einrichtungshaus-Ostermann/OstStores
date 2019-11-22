/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresBusinesshoursopen', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.OstStoresBusinesshoursopen',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.Businesshoursopen',

        'detail.Businesshoursopen',
        'detail.Window'
    ],

    models: [ 'Businesshoursopen' ],
    stores: [ 'Businesshoursopens' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});