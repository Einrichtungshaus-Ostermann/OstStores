/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

Ext.define('Shopware.apps.OstStoresHoliday.view.detail.Window', {
    extend: 'Shopware.window.Detail',
    alias: 'widget.holiday-detail-window',
    title : 'Feiertag bearbeiten',
    height: 200,
    width: 700,
    modal: true,
});
