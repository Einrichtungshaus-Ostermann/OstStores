
Ext.define('Shopware.apps.OstStores.view.detail.Stores', {
    extend: 'Shopware.model.Container',
    padding: 20,

    configure: function() {
        return {
            controller: 'OstStores'

/*
            fieldSets: [{
                title: 'Gewinnspiel',
                fields: {
                    active: 'Status',
                    name: 'Name',
                    banner: 'Banner',
                    startDate: 'Startzeitpunkt',
                    endDate: 'Endzeitpunkt',
                }
            },


                {
                    title: 'Email Einstellungen',
                    fields: {
                        emailSenderName: { fieldLabel: "Absender Name" },
                        emailSenderAddress: { fieldLabel: "Absender Adresse" },
                        emailSubject: { fieldLabel: "Betreff" },
                        emailTemplate: { fieldLabel: "Inhalt", xtype: "textarea", height: 90, grow: false }
                    }
                },


                {
                    title: 'Vielen Dank',
                    layout: 'fit',
                    fields: {
                        finishContent: { fieldLabel: null, xtype: "tinymce", height: 150, grow: false }
                    }
                }
            ]

*/


        };
    }
});

