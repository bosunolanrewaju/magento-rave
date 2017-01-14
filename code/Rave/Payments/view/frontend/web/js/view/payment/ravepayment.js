define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list',
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'ravepayment',
                component: 'Rave_Payments/js/view/payment/method-renderer/ravepayment-method'
            }
        );
        return Component.extend({});
    }
);
