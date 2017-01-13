<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Rave\Payments\Model\Ui;

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
    $this->scopeStore = ScopeConfigInterface::SCOPE_STORE;
  }

  /**
   * Retrieve assoc array of checkout configuration
   *
   * @return array
   */
  public function getConfig()
  {
    return [
      'payment' => [
        'rave' => [
          'pb_key' => $this->scopeConfig('payment/rave/pb_key', $this->scopeStore),
          'modal_title' => $this->scopeConfig('payment/rave/modal_title', $this->scopeStore),
          'modal_desc' => $this->scopeConfig('payment/rave/modal_desc', $this->scopeStore),
          'currency' => $this->scopeConfig('payment/rave/currency', $this->scopeStore),
          'country' => $this->scopeConfig('payment/rave/country', $this->scopeStore),
          'country' => $this->scopeConfig('payment/rave/country', $this->scopeStore),
          'logo' => $this->scopeConfig('payment/rave/logo', $this->scopeStore),
        ]
      ]
    ];
  }
}
