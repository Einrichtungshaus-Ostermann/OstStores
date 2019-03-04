/**
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

;(function($) {

    // our plugin
    $.plugin( "ostStoresPickupStoreSelection", {

        // defaults options which are set by data attributes
        defaults: {
            title: "",
            id: "",
            url: "",
            changestoreurl: ""
        },

        // other configurable options
        options: {
            width: 800,
            maxHeight: 600,
            sizing: 'content',
            class: 'ost-stores--pickup-store-selection-modal'
        },

        // on initialization
        init: function ()
        {
            // get this
            var me = this;

            // read data attributes
            me.applyDataAttributes();

            // click event for the checkbox
            me._on( me.$el, 'click', $.proxy( me.clickButton, me ) );
        },

        // ...
        clickButton: function ( event )
        {
            // get this
            var me = this;

            // remove scrollbars which are removed by the modal anyway
            $('html').addClass('no--scroll');

            // show loading indicator
            $.loadingIndicator.open({
                openOverlay: true,
                animationSpeed: 1,
                closeOnClick: false
            });

            // load the data
            $.ajax({
                data: { id: me.opts.id },
                dataType: 'html',
                method: 'POST',
                url: me.opts.url,
                success: function (result) {
                    // close the loading indicator and...
                    $.loadingIndicator.close(function () {
                        // ... open the modal window afterwards
                        $.modal.open(result, {
                            additionalClass: me.options.class,
                            title: me.opts.title,
                            width: me.options.width,
                            maxHeight: me.options.maxHeight,
                            sizing: me.options.sizing
                        });

                        // make every store clickable
                        $('body').find('.js--modal.ost-stores--pickup-store-selection-modal').find('div.store').click(function() {
                            // get the id
                            var id = $( this ).data('id');

                            // close the modal
                            $.modal.close();

                            // open next loading indicator before we redirect
                            $.loadingIndicator.open({
                                openOverlay: true,
                                animationSpeed: 1,
                                closeOnClick: false
                            });

                            // save store
                            window.location.href = me.opts.changestoreurl.replace('__store__', id);
                        })
                    });
                }
            });
        },

        // on destroy
        destroy: function()
        {
            // call the parent
            this._destroy();
        }

    });

    // call our plugin
    $( '*[data-ost-stores-pickup-store-selection-button="true"]' ).ostStoresPickupStoreSelection();

})(jQuery);

