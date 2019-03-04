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
    $.plugin( "ostStoresStock", {

        // defaults options which are set by data attributes
        defaults: {
            title: "",
            number: "",
            url: ""
        },

        // other configurable options
        options: {
            width: 600,
            maxHeight: 600,
            sizing: 'content',
            class: 'ost-stores--stock-modal'
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

            // load the stock data
            $.ajax({
                data: { number: me.opts.number },
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
    $( '*[data-ost-store-stock-modal-button="true"]' ).ostStoresStock();

})(jQuery);
