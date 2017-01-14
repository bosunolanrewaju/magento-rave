define(
  [
    'Magento_Checkout/js/view/payment/default',
    'Magento_Checkout/js/model/quote',
  ],
  function(Component, quote) {
    'use strict';

    return Component.extend({
      config: window.checkoutConfig,

      defaults: {
        template: 'Rave_Payments/payment/ravepayment'
      },
      getCustomerEmail: function() {
        return quote.guestEmail || this.config.customerData.email;
      },

      getQuoteAmount: function() {
        return this.config.quoteData.base_grand_total;
      },

      getQuoteCurrency: function() {
        return this.config.quoteData.base_grand_total;
      },

      quoteRef: function() {
        return 'MAGE_' + quote.getQuoteId() + '_' + new Date().valueOf();
      },

      getRaveConfigValue: function(key) {
        return this.config.payment.rave[key] || '';
      },

      onClose: function() {
        this.setErrorMessage("");
      },

      callback: function() {

      },

      /** Returns send check to info */
      buildConfig: function() {
        return {
          amount: this.getQuoteAmount(),
          country: this.getRaveConfigValue('country'),
          currency: this.getRaveConfigValue('currency'),
          custom_description: this.getRaveConfigValue('modal_desc'),
          custom_logo: this.getRaveConfigValue('logo'),
          custom_title: this.getRaveConfigValue('modal_title'),
          customer_email: this.getCustomerEmail(),
          PBFPubKey: this.getRaveConfigValue('pb_key'),
          txref: this.quoteRef(),
          onclose: this.onClose.bind(this),
          callback: this.callback.bind(this)
        };
      },

      /** Place Order action */
      makePayment: function() {
        console.log(this.buildConfig());
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
