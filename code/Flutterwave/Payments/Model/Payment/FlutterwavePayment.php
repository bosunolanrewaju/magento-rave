<?php

namespace Flutterwave\Payments\Model\Payment;

class FlutterwavePayment extends \Magento\Payment\Model\Method\AbstractMethod
{

    protected $_code = "flutterwavepayment";
    protected $_isOffline = false;

    public function isAvailable(
        \Magento\Quote\Api\Data\CartInterface $quote = null
    ) {
        return parent::isAvailable($quote);
    }
}