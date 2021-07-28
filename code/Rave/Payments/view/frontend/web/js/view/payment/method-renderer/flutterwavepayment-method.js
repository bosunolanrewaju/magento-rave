define([
    "jquery",
    "Magento_Checkout/js/view/payment/default",
    "Magento_Checkout/js/action/place-order",
    "Magento_Checkout/js/model/payment/additional-validators",
    "Magento_Checkout/js/model/quote",
    "Magento_Checkout/js/model/full-screen-loader",
    "Magento_Checkout/js/action/redirect-on-success"
  ], function(
    $,
    Component,
    placeOrderAction,
    additionalValidators,
    quote,
    fullScreenLoader,
    redirectOnSuccessAction
  ) {
    "use strict";
  
    return Component.extend({
      defaults: {
        template: "Flutterwave_Flutterwavepayments/payment/flutterwavepayment",
        customObserverName: null
      },
  
      redirectAfterPlaceOrder: false,
  
      initialize: function() {
        this._super();
        // Add Flutterwave fe-sdk script to head
        var checkoutConfig = window.checkoutConfig;
        var raveConfiguration = checkoutConfig.payment.flutterwavepayment;
  
        const endpoint = raveConfiguration.api_url;
        $("head").append('<script src="https://checkout.flutterwave.com/v3.js">');
        return this;
      },
  
      getCode: function() {
        return "flutterwavepayment";
      },
  
      getData: function() {
        return {
          method: this.item.method,
          additional_data: {}
        };
      },
  
      isActive: function() {
        return true;
      },
  
      /**
       * @override
       */
      afterPlaceOrder: function() {
        var checkoutConfig = window.checkoutConfig;
        var paymentData = quote.billingAddress();
        var raveConfiguration = checkoutConfig.payment.flutterwavepayment;
  
        if (checkoutConfig.isCustomerLoggedIn) {
          var customerData = checkoutConfig.customerData;
          paymentData.email = customerData.email;
        } else {
          var storageData = JSON.parse(
            localStorage.getItem("mage-cache-storage")
          )["checkout-data"];
          paymentData.email = storageData.validatedEmailValue;
        }
  
        var quoteId = checkoutConfig.quoteItemData[0].quote_id;
  
        var _this = this;
        _this.isPlaceOrderActionAllowed(false);
  
        var x = FlutterwaveCheckout({
            public_key: raveConfiguration.public_key,
            tx_ref: 'MAGE_'+Math.floor((Math.random() * 1000000000) + 1),
            amount: quote.totals().grand_total,
            currency: checkoutConfig.totalsData.quote_currency_code,
            country: raveConfiguration.country,
            payment_options: raveConfiguration.payment_method,
            meta: {
              QuoteId: quoteId,
              Address: paymentData.street[0] + ", " + paymentData.street[1],
              "Postal Code": paymentData.postcode,
              City: paymentData.city + ", " + paymentData.countryId
            },
            customer: {
              email: paymentData.email,
              phone_number: paymentData.telephone,
              name: "none",
            },
            callback: function (data) {
              var txref = data.tx_ref; // collect flwRef returned and pass to a 					server page to complete status check.
              if (data.status == "successful" ) {
                // redirect to a success page
                $.get(raveConfiguration.api_url+ "transactions/"+ data.id +"/verify",
                function(data, status){
                  var chargestatus = data.data.status;
                  var chargeAmount = data.data.amount;
                  var chargeCurrency = data.data.currency;
  
                  if ((chargestatus == 'successful') && (chargeAmount >= quote.totals().grand_total)  && (chargeCurrency == checkoutConfig.totalsData.quote_currency_code)) {
                    //Give Value and return to Success page
                    redirectOnSuccessAction.execute();
                    return;
                  } else {
                    _this.isPlaceOrderActionAllowed(true);
                    _this.messageContainer.addErrorMessage({
                      message: "Error, please try again"
                    });
                  }
                });
              }else {
                _this.isPlaceOrderActionAllowed(true);
                _this.messageContainer.addErrorMessage({
                  message: "Error, please try again"
                });
              }
              x.close(); // use this to close the modal immediately after payment.
            },
            onclose: function() {
              // close modal
            },
            customizations: {
              title: "magento LG Pay",
              description: "Payment for items in cart",
              logo: "https://assets.piedpiper.com/logo.png",
            },
          });
      }
    });
  });