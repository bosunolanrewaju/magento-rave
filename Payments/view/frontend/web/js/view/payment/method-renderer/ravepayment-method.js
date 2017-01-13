define(
  [
    'Magento_Checkout/js/view/payment/default'
  ],
  function(Component) {
    'use strict';
    return Component.extend({
      defaults: {
        template: 'Rave_Payments/payment/ravepayment'
      },
      getCustomerEmail: function() {
        return quote.guestEmail || window.checkoutConfig.customerData.email;
      },

      getQuoteAmount: function() {
        return window.checkoutConfig.quoteData.base_grand_total;
      },

      getQuoteCurrency: function() {
        return window.checkoutConfig.quoteData.base_grand_total;
      },

      quoteRef: function() {
        return 'MAGE_' + quote.getQuoteId();
      },

      /** Returns send check to info */
      buildConfig: function() {
        var option = window.checkoutConfig.payment.ravePayments;
        var self = this;
        return {
          amount: this.getQuoteAmount(),
          country: option.country,
          currency: option.currency,
          custom_description: option.modal_desc,
          custom_logo: option.logo,
          custom_title: option.modal_title,
          customer_email: this.getCustomerEmail(),
          PBFPubKey: option.pb_key,
          txref: this.quoteRef(),
          onclose: function() {
            self.setErrorMessage("");
            // redirectTo( redirectUrl );
          },
          callback: function(res) {
            // sendPaymentRequestResponse( res, form );
          }
        };
      },

      /** Place Order action */
      makePayment: function() {
        getpaidSetup(this.buildConfig());
      },

      setErrorMessage: function(message) {
        this.messageContainer.addErrorMessage({
          message: 'Error ni oooooo'
        });
      }
    });
  }
);
