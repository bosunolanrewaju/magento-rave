<?php
/**
 * Rave Payment gateway for accepting credit card, debit card and bank account payment on you store
 * Copyright (C) 2016  2017
 *
 * This file is part of Rave/Payments.
 *
 * Rave/Payments is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
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
    $this->scopeStore = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
  }

  /**
   * Retrieve assoc array of checkout configuration
   *
   * @return array
   */
  public function getConfig()
  {
    
    if ($this->scopeConfig->getValue('payment/rave/test_mode', $this->scopeStore)) {
      $public_key = $this->scopeConfig->getValue('payment/rave/pb_key', $this->scopeStore);
      
    } else {
      $public_key = $this->scopeConfig->getValue('payment/rave/live_pb_key', $this->scopeStore);
    }
    return [
      'payment' => [
        'rave' => [
          'pb_key' => $public_key,
          'modal_title' => $this->scopeConfig->getValue('payment/rave/modal_title', $this->scopeStore),
          'modal_desc' => $this->scopeConfig->getValue('payment/rave/modal_desc', $this->scopeStore),
          'test_mode' => $this->scopeConfig->getValue('payment/rave/test_mode', $this->scopeStore),
        ]
      ]
    ];
  }
}
