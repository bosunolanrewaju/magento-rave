<?php
 
namespace Flutterwave\Payments\Model\Ui;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class ConfigProvider
 */
final class ConfigProvider implements ConfigProviderInterface
{

  public function __construct(
    ScopeConfigInterface $scopeConfig
  )
  {
    $this->scopeConfig = $scopeConfig;
    $this->scopeStore = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
  }

  /**
   * Retrieve assoc array of checkout configuration
   *
   * @return array
   */
  public function getConfig()
  {
        $public_key = $this->scopeConfig->getValue('payment/flutterwave/live_public_key', $this->scopeStore);
        $secret_key = $this->scopeConfig->getValue('payment/flutterwave/live_secret_key', $this->scopeStore);
        $api_url = 'https://api.flutterwave.com/v3/';
        $modal_title = $this->scopeConfig->getValue('payment/flutterwave/modal_title', $this->scopeStore);
        $modal_desc = $this->scopeConfig->getValue('payment/flutterwave/modal_desc', $this->scopeStore);
        $logo = $this->scopeConfig->getValue('payment/flutterwave/logo', $this->scopeStore);
        $country = $this->scopeConfig->getValue('payment/flutterwave/country', $this->scopeStore);
        $payment_method = $this->scopeConfig->getValue('payment/flutterwave/payment_method', $this->scopeStore);
        if ($this->scopeConfig->getValue('payment/flutterwave/test_mode', $this->scopeStore)) {
            $public_key = $this->scopeConfig->getValue('payment/flutterwave/test_public_key', $this->scopeStore);
            $secret_key = $this->scopeConfig->getValue('payment/flutterwave/test_secret_key', $this->scopeStore);
            $api_url = 'https://api.flutterwave.com/v3/';
        }

        return [

            'payment' => [
                'flutterwavepayment' => [
                    'public_key' => $public_key,
                    'modal_title' => $modal_title,
                    'modal_desc' => $modal_desc,
                    'secret_key' => $secret_key,
                    'api_url' => $api_url,
                    'logo' => $logo,
                    'country' => $country,
                    'payment_method' => $payment_method,
                ]
            ]
            
        ];
  }
}