# Magento 2 Flutterwave Payment Gateway

- **Contributors:** bosunolanrewaju, anjolabassey, fluttwerwave developers
- **Tags:** Flutterwave, magento 2, payment gateway, bank account, credit card, debit card, nigeria, kenya, international, mastercard, visa
- **Tested with:** PHP 5.6+, PHP 7.0.2, Magento CE 2.1.3
- **Stable tag:** Still in BETA
- **License:** GPL-3 - see LICENSE.txt

Take payments on your magento 2 store using Rave.

Support for:

- Credit card
- Debit card
- Bank account
- Mpesa
- Mobile money
- Barter

## Description

Accept Credit card, Debit card and Bank account payment directly on your store with the Rave payment gateway for Magento 2.

#### Take Credit card payments easily and directly on your store

Signup for an account [here](https://rave.flutterwave.com)

Flutterwave is available in:

- **Nigeria**
- **Ghana**
- **Kenya**
- **South Africa**
- **Tanzania**
- **Uganda**
- **Rwanda**

## Installation

### Magento Connect

Coming Soon.

### Composer

` composer require flutterwave/module-payments`

### Manual Installation

- Click the Download Zip button and save to your local machine.
- Unpack(Extract) the archive.
- Copy the content of the **Code** directory into your Magento's **app/code** directory.
- Enable the Rave Payments module:
  From your commandline, in your magento root directory, run
  `php bin/magento module:enable Flutterwave_Payments --clear-static-content && php bin/magento setup:upgrade`

Once the `setup:upgrade` completes the module will be available in the Store Admin.

### Configure the plugin

Configuration can be done using the Administrator section of your Magento store.

- From the admin dashboard, using the left menu navigate to **Stores** > **Configuration** > **Sales** > **Payment Methods**.
- Select **Flutterwave Payments** from the list of recommended modules.
- Set **Enable** to **Yes** and fill the rest of the config form accordingly, then click the orange **Save Config** to save and activate.
  Note: Public Key is required to activate this module for cart checkout.

## Screenshots

![Configuration Screenshot](https://cloud.githubusercontent.com/assets/8383666/21956754/e5605eca-da87-11e6-855a-eddac6d33961.png)

### Suggestions / Contributions

For issues and feature request, [click here](https://github.com/bosunolanrewaju/magento-rave/issues).
To contribute, fork the repo, add your changes and modifications then create a pull request.

### License

##### GPL-3. See LICENSE.txt
