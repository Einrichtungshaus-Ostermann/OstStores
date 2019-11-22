/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

// {include file="backend/ost_stores_store/controller/main.js"}
// {include file="backend/ost_stores_store/model/store.js"}
// {include file="backend/ost_stores_store/store/stores.js"}
// {include file="backend/ost_stores_store/view/detail/store.js"}
// {include file="backend/ost_stores_store/view/detail/window.js"}
// {include file="backend/ost_stores_store/view/list/store.js"}
// {include file="backend/ost_stores_store/view/list/window.js"}

// {include file="backend/ost_stores_holiday/controller/main.js"}
// {include file="backend/ost_stores_holiday/model/holiday.js"}
// {include file="backend/ost_stores_holiday/store/holidays.js"}
// {include file="backend/ost_stores_holiday/view/detail/holiday.js"}
// {include file="backend/ost_stores_holiday/view/detail/window.js"}
// {include file="backend/ost_stores_holiday/view/list/holiday.js"}
// {include file="backend/ost_stores_holiday/view/list/window.js"}

// {include file="backend/ost_stores_businesshoursholiday/controller/main.js"}
// {include file="backend/ost_stores_businesshoursholiday/model/businesshoursholiday.js"}
// {include file="backend/ost_stores_businesshoursholiday/store/businesshoursholidays.js"}
// {include file="backend/ost_stores_businesshoursholiday/view/detail/businesshoursholiday.js"}
// {include file="backend/ost_stores_businesshoursholiday/view/detail/window.js"}
// {include file="backend/ost_stores_businesshoursholiday/view/list/businesshoursholiday.js"}
// {include file="backend/ost_stores_businesshoursholiday/view/list/window.js"}

// {include file="backend/ost_stores_businesshoursweekday/controller/main.js"}
// {include file="backend/ost_stores_businesshoursweekday/model/businesshoursweekday.js"}
// {include file="backend/ost_stores_businesshoursweekday/store/businesshoursweekdays.js"}
// {include file="backend/ost_stores_businesshoursweekday/view/detail/businesshoursweekday.js"}
// {include file="backend/ost_stores_businesshoursweekday/view/detail/window.js"}
// {include file="backend/ost_stores_businesshoursweekday/view/list/businesshoursweekday.js"}
// {include file="backend/ost_stores_businesshoursweekday/view/list/window.js"}

// {include file="backend/ost_stores_businesshoursopen/controller/main.js"}
// {include file="backend/ost_stores_businesshoursopen/model/businesshoursopen.js"}
// {include file="backend/ost_stores_businesshoursopen/store/businesshoursopens.js"}
// {include file="backend/ost_stores_businesshoursopen/view/detail/businesshoursopen.js"}
// {include file="backend/ost_stores_businesshoursopen/view/detail/window.js"}
// {include file="backend/ost_stores_businesshoursopen/view/list/businesshoursopen.js"}
// {include file="backend/ost_stores_businesshoursopen/view/list/window.js"}


Ext.define('Shopware.apps.OstStores', {
    extend: 'Enlight.app.SubApplication',
    name:'Shopware.apps.OstStores',
    loadPath: '{url action=load}',
    bulkLoad: true,
    launch: function() {
        let storeStore = Ext.create('Shopware.apps.OstStoresStore.store.Stores');
        storeStore.load();
        let holidayStore = Ext.create('Shopware.apps.OstStoresHoliday.store.Holidays');
        holidayStore.load();
        let businesshoursholidayStore = Ext.create('Shopware.apps.OstStoresBusinesshoursholiday.store.Businesshoursholidays');
        businesshoursholidayStore.load();
        let businesshoursweekdayStore = Ext.create('Shopware.apps.OstStoresBusinesshoursweekday.store.Businesshoursweekdays');
        businesshoursweekdayStore.load();
        let businesshoursopenStore = Ext.create('Shopware.apps.OstStoresBusinesshoursopen.store.Businesshoursopens');
        businesshoursopenStore.load();

        Ext.create('Enlight.app.Window', {
            height: 500,
            width: 1000,
            autoShow: true,
            title: 'Filialen',
            layout: 'fit',
            items: [
                {
                    xtype: 'tabpanel',
                    items: [
                        Ext.create('Shopware.apps.OstStoresStore.view.list.Store', {
                            title: 'Filialen',
                            store: storeStore,
                            flex: 1,
                            subApp: this
                        }),
                        Ext.create('Shopware.apps.OstStoresHoliday.view.list.Holiday', {
                            title: 'Feiertage',
                            store: holidayStore,
                            flex: 1,
                            subApp: this
                        }),
                        Ext.create('Shopware.apps.OstStoresBusinesshoursweekday.view.list.Businesshoursweekday', {
                            title: 'Öffnungszeiten - Wochentage',
                            store: businesshoursweekdayStore,
                            flex: 1,
                            subApp: this
                        }),
                        Ext.create('Shopware.apps.OstStoresBusinesshoursholiday.view.list.Businesshoursholiday', {
                            title: 'Öffnungszeiten - Feiertage',
                            store: businesshoursholidayStore,
                            flex: 1,
                            subApp: this
                        }),
                        Ext.create('Shopware.apps.OstStoresBusinesshoursopen.view.list.Businesshoursopen', {
                            title: 'Öffnungszeiten - Sonderzeiten',
                            store: businesshoursopenStore,
                            flex: 1,
                            subApp: this
                        }),

                    ]
                }
            ]
        })
    }
});
